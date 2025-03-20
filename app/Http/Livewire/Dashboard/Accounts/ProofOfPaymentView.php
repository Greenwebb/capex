<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Models\PaymentProof;
use App\Models\Transaction;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\Storage;

class ProofOfPaymentView extends Component
{
    use WithPagination, UserTrait;

    protected $paginationTheme = 'bootstrap'; // Ensure pagination styling works with Bootstrap
    public $selectedPaymentProof;
    public $showModal = false;

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

            $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Payment proof accepted successfully.']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'Payment proof acceptance failed.']);
        }
    }

    // Decline Payment Proof
    public function declineProof($proofId)
    {
        try {
            $proof = PaymentProof::findOrFail($proofId);
            $proof->status = 'declined';
            $proof->save();

            $this->dispatchBrowserEvent('notify', ['type' => 'warning', 'message' => 'Payment proof declined successfully.']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'Failed to decline payment proof.']);
        }
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

            $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Payment proof deleted successfully.']);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notify', ['type' => 'error', 'message' => 'Failed to delete payment proof.']);
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