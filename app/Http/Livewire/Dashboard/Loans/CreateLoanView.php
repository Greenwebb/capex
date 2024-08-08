<?php

namespace App\Http\Livewire\Dashboard\Loans;

use App\Models\LoanProduct;
use App\Models\LoanType;
use App\Models\LoanCategory;
use App\Models\LoanChildType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;
use App\Traits\LoanTrait;
use Livewire\Component;

class CreateLoanView extends Component
{
    use AuthorizesRequests, LoanTrait;

    public $users, $user_basic_pay, $user_net_pay;
    public $loan_products = [], $loan_types, $loan_child_types = [], $borrowers;
    public $selectedLoanType = null, $selectedLoanCategory = null;

    public function mount()
    {
        $this->loan_types = LoanType::all();
        $this->borrowers = User::role('user')->get();
        $this->users = User::role('user')->with('active_loans.loan')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.loans.create-loan-view')->layout('layouts.main');
    }

    public function updatedSelectedLoanType($loanTypeId)
    {
        $this->loan_child_types = LoanChildType::where('loan_type_id', $loanTypeId)->get();
        $this->selectedLoanCategory = null; // Reset selected loan category
        $this->loan_products = []; // Reset loan products when loan type changes
    }

    public function updatedSelectedLoanCategory($loanCategoryId)
    {
        $this->loan_products = LoanProduct::where('loan_child_type_id', $loanCategoryId)->get();
    }
}
