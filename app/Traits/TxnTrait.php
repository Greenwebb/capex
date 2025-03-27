<?php

namespace App\Traits;
use App\Models\Transaction;

trait TxnTrait
{
    public function transaction_entry(array $data) {
        Transaction::create([
            'application_id' => $data['loan_id'] ?? null,
            'proof_id' => $data['proof_id'] ?? null,
            'balance_statement_id' => $data['balance_statement_id'] ?? null,
            'amount_settled' => $data['amount'] ?? 0,
            'transaction_fee' => 0,
            'profit_margin' => 0,
            'proccess_by' => ($data['fname'] ?? '') . ' ' . ($data['lname'] ?? ''),
            'charge_amount' => 0,
            'method' => $data['method'] ?? 'unknown',
            'user_id' => $data['user_id'] ?? null,
            'installment_id' => $data['installment_id'] ?? null,
        ]);
    }

}