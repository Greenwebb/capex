<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Models\PaymentProof;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProofOfPaymentView extends Component
{
    use WithPagination, UserTrait;

    protected $paginationTheme = 'bootstrap';

    // Accept Payment Proof
    public function acceptProof($proofId)
    {
        try {
            $proof = PaymentProof::findOrFail($proofId);
            $proof->status = 'accepted';
            $proof->save();

            Transaction::create([
                'application_id' => $proof->loan_id,
                'amount_settled' => $proof->amount,
                'transaction_fee' => 0,
                'profit_margin' => 0,
                'proccess_by' => $proof->user->fname . ' ' . $proof->user->lname,
                'charge_amount' => 0,
                'method' => $proof->method,
                'user_id' => $proof->user_id,
            ]);

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
