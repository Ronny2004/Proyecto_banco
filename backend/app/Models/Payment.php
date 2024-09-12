<?php

// app/Models/Payment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'loan_id',
        'amount',
        'date',
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
}
