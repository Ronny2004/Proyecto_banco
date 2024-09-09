<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'amount',
        'interest_rate',
        'start_date',
        'end_date',
        'total_borrowed', // Asegúrate de que este campo esté en la base de datos
        'total_to_pay', // Asegúrate de que este campo esté en la base de datos
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function getMonthlyPaymentAttribute()
    {
        $startDate = Carbon::parse($this->start_date);
        $endDate = Carbon::parse($this->end_date);
        $totalMonths = $startDate->diffInMonths($endDate) + 1;

        // Evitar la división por cero
        if ($totalMonths <= 0 || $this->total_to_pay <= 0) {
            return 0;
        }

        return $this->total_to_pay / $totalMonths;
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getDateAttribute()
    {
        return Carbon::parse($this->start_date); // O usa el atributo deseado
    }
}
