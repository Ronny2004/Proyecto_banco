<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Client;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('client')->get();
        return view('loans.index', compact('loans'));
    }

    public function create()
    {
        // Obtener todos los clientes para el select
        $clients = Client::all()->pluck('name', 'id');
        return view('loans.create', compact('clients'));
    }

    public function manageSingle($loan)
    {
        $loan = Loan::findOrFail($loan);

        // Asegúrate de que las fechas sean válidas
        $startDate = Carbon::parse($loan->start_date);
        $endDate = Carbon::parse($loan->end_date);

        // Calcular el número total de semanas
        $days = $startDate->diffInDays($endDate);
        $totalWeeks = intdiv($days, 7) + 1; // +1 para incluir la semana actual

        // Calcular el monto semanal
        $weeklyAmount = $totalWeeks > 0 ? $loan->amount / $totalWeeks : 0;

        // Obtener los pagos semanales
        $weeklyPayments = $this->getWeeklyPayments($loan, $startDate, $endDate);

        // Calcular el total acumulado
        $totalAmount = $weeklyPayments->sum('amount');

        return view('loans.manage-single', [
            'loan' => $loan,
            'weeklyAmount' => $weeklyAmount,
            'weeklyPayments' => $weeklyPayments,
            'totalAmount' => $totalAmount,
            'totalWeeks' => $totalWeeks,
        ]);
    }

    protected function getWeeklyPayments($loan, $startDate, $endDate)
    {
        $payments = Payment::where('loan_id', $loan->id)
                           ->whereBetween('date', [$startDate, $endDate])
                           ->orderBy('date')
                           ->get();

        // Agrupar los pagos por semana
        $weeklyPayments = $payments->groupBy(function ($payment) {
            return Carbon::parse($payment->date)->startOfWeek()->format('Y-m-d');
        })->map(function ($group) {
            return $group->sum('amount');
        });

        return $weeklyPayments;
    }

    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric|min:0',
            'months' => 'required|numeric|min:1', // Asegurando que los meses sean numéricos
            'start_date' => 'required|date',
        ]);

        // Variables iniciales
        $amount = $validated['amount'];
        $interestRate = 0.03; // 3% de interés mensual
        $months = (int)$validated['months'];

        // Calcular el interés por mes
        $monthlyInterest = $amount * $interestRate;
        // Calcular el total de interés por el número de meses
        $totalInterest = $monthlyInterest * $months;
        // Calcular el total a pagar sumando el interés total al monto del préstamo
        $totalapagar = $amount + $totalInterest;

        // Calcular la fecha de fin basada en los meses
        $startDate = Carbon::parse($validated['start_date']);
        $endDate = $startDate->copy()->addMonths($months);

        // Crear el préstamo
        Loan::create([
            'client_id' => $validated['client_id'],
            'amount' => $amount,
            'interest_rate' => $interestRate * 100, // Guardar la tasa de interés como porcentaje
            'start_date' => $startDate,
            'end_date' => $endDate,
            'totalapagar' => $totalapagar, // Asegúrate de que este nombre coincida con el campo en la base de datos
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('loans.index')->with('success', 'Préstamo creado exitosamente.');
    }
}
