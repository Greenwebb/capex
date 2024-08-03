<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_name',
        'description',
        'icon',
        'alt_icon',
    ];

    public function loan_type(){
        return $this->hasMany(LoanType::class);
    }

    public function loan_child_type(){
        return $this->hasMany(LoanChildType::class);
    }
}
