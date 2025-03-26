<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Loan;
use App\Models\LoanInstallment;

class DownloaderController extends Controller
{
    public function downloadSchedule(Application $loan)
    {
        $repayment_schedule = LoanInstallment::where('loan_id', $loan->id)
            ->orderBy('next_dates', 'asc')
            ->get();
        
        $data = [
            'loan' => $loan,
            'repayment_schedule' => $repayment_schedule,
            'user' => $loan->user,
            'date' => now()->format('d M, Y'),
            'total_paid' => Application::loanPaidSofar($loan->id),
            'remaining_balance' => Application::loanBalance($loan->id)
        ];
        
        $pdf = Pdf::loadView('downloads.schedule-pdf', $data);
        
        return $pdf->download("loan-schedule-{$loan->id}.pdf");
    }


    public function downloadBalanceStatement(Application $loan)
    {
        $balance_statement = $loan->balance_statement; // Or your query to get the statement
        $user = $loan->user;
        
        $data = [
            'loan' => $loan,
            'balance_statement' => $balance_statement,
            'user' => $user,
            'date' => now()->format('d M, Y'),
            'total_paid' => collect($balance_statement)->sum('credit'),
            'outstanding_balance' => collect($balance_statement)->last()->balance_after_payment ?? 0
        ];
        
        $pdf = Pdf::loadView('downloads.balance-statement-pdf', $data);
        
        return $pdf->download("loan-balance-statement-{$loan->id}.pdf");
    }
}