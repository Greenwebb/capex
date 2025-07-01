<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

use App\Classes\Exports\LoanExport;
use App\Models\Application;
use App\Models\User;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use App\Traits\LoanTrait;
use App\Traits\SettingTrait;

class RejectedLoansView extends Component
{
    use EmailTrait, WalletTrait, LoanTrait, SettingTrait;
    public $loan_requests, $loan_request, $new_loan_user, $user_basic_pay, $user_net_pay, $loan_id;
    public $type = [];
    public $status = [];
    public $view = 'list';
    public $users, $due_date;
    public $assignModal = false;
    public $title = 'Rejected Loans';

    public function render()
    {
        try {
            $this->users = User::role('user')->without('applications')->get();
            $this->loan_requests = Application::where('status', 3)->orderBy('created_at', 'desc')->get();
            $requests = $this->loan_requests;
            return view('livewire.dashboard.loans.rejected-loans-view',[
                'requests' => $requests
            ])->layout('layouts.main');
        } catch (\Throwable $th) {
            $this->loan_requests = [];
            $requests = [];
            if (auth()->user()->hasRole('user')) {
                return view('livewire.dashboard.loans.rejected-loans-view',[
                    'requests'=>$requests
                ])->layout('layouts.dashboard');
            }else{
                dd($th);
                return view('livewire.dashboard.loans.rejected-loans-view',[
                    'requests'=>$requests
                ])->layout('layouts.main');
            }
        }
    }
} 