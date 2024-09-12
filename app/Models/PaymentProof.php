<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PaymentProof extends Model
{
    use HasFactory;

    // Allow mass assignment on these attributes
    protected $fillable = [
        'user_id',
        'loan_id',
        'amount',
        'method',
        'status',
        'payment_details', // The details about the payment
        'document_paths',  // The paths of the uploaded documents (stored as JSON)
    ];

    // Cast the 'document_paths' field to an array since it's stored as JSON in the database
    protected $casts = [
        'document_paths' => 'array',
    ];
}
