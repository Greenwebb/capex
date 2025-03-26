<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Models\Application;
use App\Models\Loans;
use App\Models\PaymentProof;
use App\Models\Transaction;
use App\Traits\LoanTrait;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\UserTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProofOfPaymentView extends Component
{
    use WithPagination, UserTrait, LoanTrait;

    protected $paginationTheme = 'bootstrap';

    // Accept Payment Proof
    public function acceptProof($proofId)
    {
        try {
            $proof = PaymentProof::findOrFail($proofId);
            $proof->status = 'accepted';
            $proof->save();

            // dd((int)$proof->amount);
            Transaction::create([
                'application_id' => $proof->loan_id,
                'proof_id' => $proofId,
                'amount_settled' => $proof->amount,
                'transaction_fee' => 0,
                'profit_margin' => 0,
                'proccess_by' => $proof->user->fname . ' ' . $proof->user->lname,
                'charge_amount' => 0,
                'method' => $proof->method,
                'user_id' => $proof->user_id,
            ]);
            // Close loan if the balance is 0
            $borrower_loan = Application::where('id', $proof->loan_id)->first();
            if (Loans::loan_balance($proof->loan_id) < 1) {
                $borrower_loan->closed = 1;
                $borrower_loan->date_paid = Carbon::now();
                $borrower_loan->save();
            } else {
                $borrower_loan->closed = 0;
                $borrower_loan->save();
            }

            $this->sheet_installment_entry($borrower_loan, $proof->amount, $proof->method);
            session()->flash('success', 'Payment proof accepted successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Payment proof acceptance failed.');
        }
    }

    // Decline Payment Proof
    public function declineProof($proofId)
    {
        try {
            $proof = PaymentProof::findOrFail($proofId);
            $proof->status = 'declined';
            $proof->save();

            session()->flash('warning', 'Payment proof declined successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to decline payment proof.');
        }
        return redirect()->back();
    }

    // Delete Payment Proof
    public function removeProof($proofId)
    {
        try {
            $proof = PaymentProof::findOrFail($proofId);
            if (!empty($proof->document_paths)) {
                foreach ($proof->document_paths as $path) {
                    if (Storage::exists('public/' . $path)) {
                        Storage::delete('public/' . $path);
                    }
                }
            }

            $proof->delete();
            Transaction::where('proof_id', $proofId)->delete();

            // Close loan if the balance is 0
            $borrower_loan = Application::where('id', $proof->loan_id)->first();

            if (Loans::loan_balance($proof->loan_id) < 1) {
                $borrower_loan->closed = 1;
                $borrower_loan->date_paid = Carbon::now();
                $borrower_loan->save();
            } else {
                $borrower_loan->closed = 0;
                $borrower_loan->save();
            }
            session()->flash('success', 'Payment proof deleted successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete payment proof.');
        }
    }

    public function render()
    {
        $paymentProofs = PaymentProof::latest()->paginate(10);
        return view('livewire.dashboard.accounts.proof-of-payment-view', [
            'paymentProofs' => $paymentProofs,
        ])->layout('layouts.main');
    }
}