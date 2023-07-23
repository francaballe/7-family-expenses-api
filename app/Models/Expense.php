<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'expense_date',
        'due_date',
        'description',
        'amount',
        'comment',
        'proof_url',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


