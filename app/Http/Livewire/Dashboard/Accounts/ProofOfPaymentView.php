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

    public $selectedPaymentProof;
    public $showModal = false;

    // Accept proof of payment (simple status update)
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
                'proccess_by' => $proof->user->fname.' '.$proof->user->lname,
                'charge_amount' => 0,
                'method' => $proof->method,
                'user_id' => $proof->user_id,
            ]);

            session()->flash('message', 'Payment proof accepted successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Payment proof acceptance failed.');
        }
    }

    // Decline proof of payment
    public function declineProof($proofId)
    {
        try {
            $proof = PaymentProof::findOrFail($proofId);
            $proof->status = 'declined';
            $proof->save();

            session()->flash('message', 'Payment proof declined successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to decline payment proof.');
        }
    }

    // Delete proof of payment
    public function removeProof($proofId)
    {
        try {
            $proof = PaymentProof::findOrFail($proofId);

            // Delete associated files from storage
            if (!empty($proof->document_paths)) {
                foreach ($proof->document_paths as $path) {
                    Storage::delete('public/' . $path);
                }
            }

            $proof->delete();

            session()->flash('message', 'Payment proof deleted successfully.');
        } catch (\Throwable $th) {
            session()->flash('error', 'Failed to delete payment proof.');
        }
    }

    public function viewProof($proofId)
    {
        $this->selectedPaymentProof = PaymentProof::findOrFail($proofId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        $paymentProofs = PaymentProof::latest()->paginate(10);
        return view('livewire.dashboard.accounts.proof-of-payment-view', [
            'paymentProofs' => $paymentProofs,
        ])
        ->layout('layouts.main');
    }
}