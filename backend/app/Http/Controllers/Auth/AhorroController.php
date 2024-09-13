<?php
// app/Http/Controllers/AhorroController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ahorros;

class AhorroController extends Controller
{
    public function store(Request $request)
    {
        // Valida los datos de la solicitud
        $validatedData = $request->validate([
            'cliente_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Crea un nuevo registro de ahorro
        $ahorro = new Ahorros();
        $ahorro->cliente_id = $validatedData['cliente_id'];
        $ahorro->amount = $validatedData['amount'];
        $ahorro->save();

        return redirect()->route('pagos.index')->with('success', 'Ahorro registrado exitosamente.');
    }
}
