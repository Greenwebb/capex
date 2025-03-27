<?php

namespace App\Http\Controllers;

use App\Models\BalanceStatement;
use App\Http\Requests\StoreBalanceStatementRequest;
use App\Http\Requests\UpdateBalanceStatementRequest;
use App\Traits\LoanTrait;
use Illuminate\Http\Request;

class BalanceStatementController extends Controller
{
    use LoanTrait;
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
        // Create the balance statement
        BalanceStatement::create($request->all());

        // Get debit and credit values
        $debit = $request->input('debit');
        $credit = $request->input('credit');

        // Only create transaction if there's a non-zero debit credit
        if (!empty($credit)) {
            $data = [
                'loan_id' => $request->input('loan_id'),
                'fname' => auth()->user()->fname,
                'lname' => auth()->user()->lname,  // Fixed from fname to lname
                'amount' => !empty($debit) ? $debit : $credit,
                'method' => $request->input('payment_method', 'unknown'),
                'user_id' => $request->input('user_id', auth()->id()),
            ];
            $this->transaction_entry($data);
        }
        return redirect()->back()->with('success', 'Entry added successfully.');
    }

    public function update(Request $request, $id = null)
    {
        BalanceStatement::findOrFail($id)->update($request->all());
        return redirect()->back()->with('success', 'Entry updated successfully.');
    }

    public function destroy(BalanceStatement $entry)  // Using route model binding
    {
        $entry->delete();
        return redirect()->back()->with('success', 'Entry deleted successfully');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBalanceStatementRequest  $request
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    // public function update(UpdateBalanceStatementRequest $request, BalanceStatement $balanceStatement)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceStatement  $balanceStatement
     * @return \Illuminate\Http\Response
     */
    // public function destroy(BalanceStatement $balanceStatement)
    // {
    //     //
    // }
}