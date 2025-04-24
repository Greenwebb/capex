<?php

namespace App\Http\Controllers;

use App\Models\BalanceStatement;
use App\Http\Requests\StoreBalanceStatementRequest;
use App\Http\Requests\UpdateBalanceStatementRequest;
use App\Models\Application;
use App\Traits\LoanTrait;
use App\Traits\TxnTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BalanceStatementController extends Controller
{
    use LoanTrait, TxnTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBalanceStatementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'loan_id' => 'required|integer',
                'debit' => 'nullable|numeric',
                'credit' => 'nullable|numeric',
                'user_id' => 'nullable|integer',
                'payment_method' => 'nullable|string',
                'payment_date' => 'required',
                'description' => 'required',
            ]);
            $data = [
                'loan_id' => $validated['loan_id'],
                'fname' => auth()->user()->fname,
                'lname' => auth()->user()->lname,
                'amount' => $validated['credit'], //Only credit (repayment transaction recording)
                'method' => $validated['payment_method'] ?? 'unknown',
                'payment_date' => $validated['payment_date'],
                'user_id' => $validated['user_id'] ?? auth()->id(),
            ];
            $loan = Application::where('id', $validated['loan_id'])->first();

            if ($request->filled('debit') && $request->filled('credit')) {
                return redirect()->back()->with('error', 'Only one of debit or credit should be filled.');
            }

            DB::beginTransaction();
            $existing = BalanceStatement::where([
                'loan_id' => $validated['loan_id'],
                'debit' => $validated['debit'] ?? 0,
                'credit' => $validated['credit'] ?? 0,
            ])->first();

            if ($existing) {
                return redirect()->back()->with('info', 'Duplicate entry detected. No new entry added.');
            }
            if ($validated['credit']) {
                $this->transaction_entry($data);// Create balance statement
                $entry = [
                    'loan' => $loan,
                    'amount' => $validated['credit'] ?? $validated['debit'],
                    'method' => $validated['payment_method'] ?? 'other',
                    'desc' => $validated['description'],
                    'date' => $validated['payment_date'],
                ];
                $type = $request->filled('debit') ? 'debit':'credit';
                $this->sheet_installment_entry($entry['loan'], $entry['amount'], $type, $entry['method'], $entry['desc'], $entry['date']);
            }else{
                //No transaction entry required.
                $this->sheet_penalty_entry($loan, $validated['debit'], $validated['payment_method'], $validated['description']);
            }

            if ($request->filled('credit')) { 
                $this->update_repayment_status($request->filled('credit'), $request->input('payment_date'), $loan->id);
            }
            $this->close_loan($loan->id);
            DB::commit();
            return redirect()->back()->with('success', 'Entry added successfully.');
        } catch (\Throwable $th) {
            report($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'An error occurred while saving the entry. ' . $th->getMessage());
        }
    }


    public function update(Request $request, $id = null)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'loan_id' => 'required',
                'payment_date' => 'required',
                'description' => 'nullable|string',
                'debit' => 'nullable|numeric',
                'credit' => 'nullable|numeric',
                'payment_method' => 'nullable|string',
                'user_id' => 'nullable',
            ]);
            if ($request->filled('debit') && $request->filled('credit')) {
                return redirect()->back()->with('error', 'Only one of debit or credit should be filled.');
            }

            $balanceStatement = BalanceStatement::find($id);
            if (!$balanceStatement) {
                return redirect()->back()->with('error', 'Balance statement not found.');
            }
            $amount = $request->input('debit') ?? $request->input('credit');
            $data = [
                'loan_id' => $request->input('loan_id'),
                'fname' => auth()->user()->fname,
                'lname' => auth()->user()->lname,
                'amount' => $amount,
                'user_id' => $request->input('user_id') ?? auth()->id(),
                'created_at' => $request->input('payment_date'),
            ];
            $this->transaction_update($data);

            //write the logic of first deleting the entry then recreating it(as a form of updating)
            $balanceStatement->payment_date = Carbon::parse($request->input('payment_date'));
            $balanceStatement->description = $request->input('description');
            $balanceStatement->debit = $request->input('debit') ?? null;
            $balanceStatement->credit = $request->input('credit') ?? null;
            $balanceStatement->payment_method = $request->input('payment_method') ?? null;
            $balanceStatement->save();

            $loan = Application::where('id', $data['loan_id'])->first();
            $this->close_loan($loan->id);
            if ($request->filled('credit')) {
                $this->update_repayment_status($request->filled('credit'), $request->input('payment_date'), $loan->id);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Entry updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Entry update failed. ' . $th->getMessage());
        }
    }

    public function destroy($entry)  // Using route model binding
    {
        $statement = BalanceStatement::where('id', $entry)->first();
        try {

            $data = [
                'entry_id' => $statement->id,
                'loan_id' => $statement->loan_id,
                'fname' => auth()->user()->fname,
                'lname' => auth()->user()->lname,
                'amount' => $statement->credit,
                'date' => $statement->payment_date,
            ];

            $this->transaction_removal($data);
            BalanceStatement::where('id', $statement->id)->delete();
            $this->open_loan($data['amount'], $data['date'], $data['loan_id']);
            return redirect()->back()->with('success', 'Deleted successfully.');
        } catch (\Throwable $th) {
            dd($th);
            return response()->json(['error' => 'Deleted failed']);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceStatement $balanceStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceStatement $balanceStatement)
    {
        //
    }
}