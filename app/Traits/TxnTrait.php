<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\Transaction;

trait TxnTrait
{
    public function transaction_entry(array $data)
    {
        $balance = Application::loanBalance($data['loan_id']);

        // if ($data['amount'] <= $balance) {
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
        // } else {
        //     // ❌ Do not allow over-payment
        //     throw new \Exception('The amount provided exceeds the remaining loan balance. No overpayments allowed.');
        // }
    }

    public function transaction_update(array $data)
    {
        $balance = Application::loanBalance($data['loan_id']);
        // if ($data['amount'] <= $balance) {
            // Update the latest matching transaction for the given loan_id and user_id
            $transaction = Transaction::where('application_id', $data['loan_id'])
                ->where('user_id', $data['user_id'])
                ->latest()
                ->first();

            if ($transaction) {
                $transaction->update([
                    'amount_settled'=>$data['amount'],
                    'proccess_by'=>$data['fname'] . ' ' . $data['lname'],
                    'created_at'=>$data['created_at'] ?? now()
                ]);
            }
        // } else {
        //     // ❌ Do not allow over-payment
        //     throw new \Exception('The amount provided exceeds the remaining loan balance. No overpayments allowed.');
        // }

    }

    public function transaction_removal(array $data)
    {
        // Remove the latest matching transaction by loan_id and amount
        $transaction = Transaction::where('application_id', $data['loan_id'])
            ->where('amount_settled', $data['amount_settled'])
            ->latest()
            ->first();

        if ($transaction) {
            $transaction->delete();
        }
    }

}