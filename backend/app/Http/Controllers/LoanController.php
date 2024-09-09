<?php
// app/Http/Controllers/LoanController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Client;

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

    public function store(Request $request)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric|min:0',
            'interest_rate' => 'nullable|numeric|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Crear el préstamo
        Loan::create([
            'client_id' => $validated['client_id'],
            'amount' => $validated['amount'],
            'interest_rate' => $validated['interest_rate'] ?? 10.00, // Valor por defecto si no se proporciona
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('loans.index')->with('success', 'Préstamo creado exitosamente.');
    }
}
