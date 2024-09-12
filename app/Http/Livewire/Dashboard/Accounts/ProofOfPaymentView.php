<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Models\PaymentProof;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\UserTrait;

class ProofOfPaymentView extends Component
{
    use WithPagination, UserTrait;

    public $selectedPaymentProof;
    public $showModal = false;

    // Accept proof of payment (simple status update)
    public function acceptProof($proofId)
    {
        $proof = PaymentProof::findOrFail($proofId);
        $proof->status = 'accepted'; // Assuming you have a 'status' column
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
    }

    // Open modal to view the proof details
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

    // public function getUserInfo($id){
    //     $user = User::where('id', $id)->first();
    //     return $user->fname.' '.$user->lname;
    // }
}
