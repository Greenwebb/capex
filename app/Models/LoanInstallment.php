<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LoanInstallment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'txn_id',
        'application_id',
        'next_dates',
        'type', // manual or auto
        'paid_at',
        'penalty',
        'is_cleared',
        'payment_method',
        'amount',
        'due_date',
        'principal',
        'interest',
        'remaining_balance',
        'status'
    ];

    public function loans()
    {
        return $this->belongsTo(Loans::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Calculate and store all installment dates
     */
    public function generateInstallmentDates($loan)
    {
        $installments = [];
        $startDate = Carbon::parse($loan->updated_at);
        $duration = $loan->repayment_plan;
        $periodType = $loan->repayment_frequency; // 'weekly', 'monthly', 'yearly'
        
        for ($i = 1; $i <= $duration; $i++) {
            $dueDate = clone $startDate;
            
            switch ($periodType) {
                case 'weekly':
                    $dueDate->addWeeks($i);
                    break;
                case 'monthly':
                    $dueDate->addMonths($i);
                    break;
                case 'yearly':
                    $dueDate->addYears($i);
                    break;
                default:
                    $dueDate->addMonths($i); // default to monthly
            }
            
            $installments[] = [
                'due_date' => $dueDate->format('Y-m-d H:i:s'),
                'amount' => $loan->amount / $duration,
                'status' => 'pending'
            ];
        }
        
        return $installments;
    }

    /**
     * Get the next pending installment for a loan
     */
    public function getNextInstallment($loanId)
    {
        return $this->where('loan_id', $loanId)
                    ->whereNull('paid_at')
                    ->orderBy('next_dates', 'asc')
                    ->first();
    }

    /**
     * Mark an installment as paid
     */
    public function markAsPaid($installmentId, $paymentMethod = 'cash', $txnId = null)
    {
        $installment = $this->findOrFail($installmentId);
        $installment->update([
            'paid_at' => Carbon::now(),
            'payment_method' => $paymentMethod,
            'txn_id' => $txnId
        ]);
        
        return $installment;
    }
}