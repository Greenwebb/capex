<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\LoanInstallment;
use App\Models\Transaction;
use Carbon\Carbon;

trait TxnTrait
{
    public function transaction_entry(array $data)
    {

        $balance = Application::loanBalance($data['loan_id']);
        Transaction::create([
            'application_id' => $data['loan_id'] ?? null,
            'proof_id' => $data['proof_id'] ?? null,
            'balance_statement_id' => $data['balance_statement_id'] ?? null,
            'amount_settled' => $data['amount'] ?? 0,
            'transaction_fee' => 0,
            'profit_margin' => 0,
            'proccess_by' => trim(($data['fname'] ?? '') . ' ' . ($data['lname'] ?? '')),
            'charge_amount' => 0,
            'method' => $data['method'] ?? 'unknown',
            'user_id' => $data['user_id'] ?? null,
            'installment_id' => $data['installment_id'] ?? null,
            'created_at' => $data['payment_date'] ?? now(),
        ]);
    }

    public function transaction_update(array $data)
    {
        // Update the latest matching transaction for the given loan_id and user_id
        $transaction = Transaction::where('application_id', $data['loan_id'])
            ->where('user_id', $data['user_id'])
            ->latest()
            ->first();

        if ($transaction) {
            $transaction->update([
                'amount_settled' => $data['amount'],
                'proccess_by' => $data['fname'] . ' ' . $data['lname'],
                'created_at' => $data['created_at'] ?? now()
            ]);
        }
    }

    public function transaction_removal(array $data)
    {
        $date = Carbon::parse($data['date'])->toDateTimeString();

        $transaction = Transaction::where('application_id', $data['loan_id'])
            ->where('amount_settled', $data['amount'])
            ->whereDate('created_at', '=', $date)
            ->first();

        if ($transaction) {
            $transaction->delete();
        }
    }


    // public function transaction_removal(array $data)
    // {
    //     // Remove the latest matching transaction by loan_id and amount
    //     $transaction = Transaction::where('application_id', $data['loan_id'])
    //         ->where('amount_settled', $data['amount'])
    //         ->where('created_at', $data['date'])
    //         ->first();
    //     // dd($transaction);
    //     $transaction?->delete();
    // }

    // public function update_repayment_status($amount_paid, $date_paid, $loan_id)
    // {
    //     $date_paid = \Carbon\Carbon::parse($date_paid);

    //     $installments = LoanInstallment::where('loan_id', $loan_id)
    //         ->whereNot('status', 'Cleared')
    //         ->orderBy('due_date', 'asc')
    //         ->get();

    //     foreach ($installments as $installment) {
    //         if ($amount_paid <= 0) break;

    //         $total_due = floatval($installment->amount);

    //         if ($amount_paid >= $total_due) {
    //             // When Fully paid, and amount overlaps installment amount take/subtract from the next installment and update the next installment balance
    //             $installment->status = 'Cleared';
    //             $installment->paid_at = $date_paid;
    //             $amount_paid -= $total_due;
    //         } else {
    //             // Partially paid
    //             $installment->status = 'Partial';
    //             $installment->paid_at = $date_paid;
    //             $amount_paid = 0;
    //         }

    //         $installment->save();
    //     }

    //     return;
    // }
    public function update_repayment_status($amount_paid, $date_paid, $loan_id)
    {
        $date_paid = Carbon::parse($date_paid);

        $installments = LoanInstallment::where('loan_id', $loan_id)
            ->whereNot('status', 'Cleared')
            ->orderBy('due_date', 'asc')
            ->get();

        // dd($installments);

        foreach ($installments as $installment) {
            if ($amount_paid <= 0) break;

            $total_due = floatval($installment->amount);
            $remaining_balance = floatval($installment->remaining_balance ?? $total_due); // fallback if null

            if ($amount_paid >= $remaining_balance) {
                // Enough to clear this installment
                $installment->status = 'Cleared';
                $installment->paid_at = $date_paid;
                $installment->remaining_balance = 0;
                $amount_paid -= $remaining_balance;
            } else {
                // Partial payment
                $installment->status = 'Partial';
                $installment->paid_at = $date_paid;
                $installment->remaining_balance = $remaining_balance - $amount_paid;
                $amount_paid = 0;
            }

            $installment->save();
        }

        return;
    }

    public function rollback_repayment_status($amount_to_rollback, $rollback_date, $loan_id)
    {
        $rollback_date = Carbon::parse($rollback_date);

        $installments = LoanInstallment::where('loan_id', $loan_id)
            ->whereIn('status', ['Cleared', 'Partial'])
            ->where('paid_at', $rollback_date) // rollback only the ones affected on this date
            ->orderBy('due_date', 'desc') // reverse order for rollback
            ->get();

        foreach ($installments as $installment) {
            if ($amount_to_rollback <= 0) break;

            $total_due = floatval($installment->amount);
            $already_paid = $total_due - floatval($installment->remaining_balance ?? 0);

            if ($amount_to_rollback >= $already_paid) {
                // Rollback the full paid amount for this installment
                $installment->status = 'Pending';
                $installment->remaining_balance = $total_due;
                $installment->paid_at = null;
                $amount_to_rollback -= $already_paid;
            } else {
                // Partial rollback
                $installment->status = 'Partial';
                $installment->remaining_balance += $amount_to_rollback;
                $amount_to_rollback = 0;
            }

            $installment->save();
        }

        return;
    }

}