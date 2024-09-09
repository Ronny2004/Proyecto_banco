<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $data = $clients->map(function ($client) {
            $interestRate = $this->calculateInterestRate($client->bank_balance); // Método para calcular el interés
            $interest = $client->bank_balance * ($interestRate / 100);
            $totalAmount = $client->bank_balance + $interest;

            return [
                'name' => $client->first_name . ' ' . $client->last_name,
                'bank_balance' => $client->bank_balance,
                'interest_rate' => $interestRate,
                'interest' => $interest,
                'total_amount' => $totalAmount,
            ];
        });

        return view('balance.index', compact('data'));
    }

    private function calculateInterestRate($bankBalance)
    {
        // Aquí se calcula el interés basado en el monto en el banco
        return 5; // Ejemplo de tasa fija
    }
}
