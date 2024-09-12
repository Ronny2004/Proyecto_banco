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
        'totalapagar', // Asegúrate de que este campo esté en la base de datos
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    // Método para calcular el total a pagar usando interés simple
    private function calculateTotalAPagar($amount, $interestRate, $months)
    {
        // Cálculo de interés simple
        $totalInterest = ($amount * ($interestRate / 100)) * ($months);
        return $amount + $totalInterest;
    }

    // Accesor para calcular el total a pagar (monto + interés)
    public function getTotalAPagarAttribute()
    {
        $months = Carbon::parse($this->start_date)->diffInMonths(Carbon::parse($this->end_date));
        return $this->calculateTotalAPagar($this->amount, $this->interest_rate, $months);
    }

    // Accesor para el pago mensual
    public function getMonthlyPaymentAttribute()
    {
        $totalMonths = Carbon::parse($this->start_date)->diffInMonths(Carbon::parse($this->end_date)) + 1;

        // Evitar la división por cero
        if ($totalMonths <= 0 || $this->totalapagar <= 0) {
            return 0;
        }

        return $this->totalapagar / $totalMonths;
    }

    // Accesor para el pago semanal
    public function getWeeklyPaymentAttribute()
    {
        $totalWeeks = Carbon::parse($this->start_date)->diffInWeeks(Carbon::parse($this->end_date)) + 1;

        // Evitar la división por cero
        if ($totalWeeks <= 0 || $this->totalapagar <= 0) {
            return 0;
        }

        return $this->totalapagar / $totalWeeks;
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
