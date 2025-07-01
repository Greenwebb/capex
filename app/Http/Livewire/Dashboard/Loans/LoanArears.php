<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;
use App\Traits\LoanTrait;

class LoanArears extends Component
{
    use LoanTrait;
    public $loan_requests;


    public function render(){
        $this->loan_requests = $this->getLoanArears('auto');

        // dd($this->loan_requests);
        return view('livewire.dashboard.loans.loan-arears')->layout('layouts.main');
    }
}
