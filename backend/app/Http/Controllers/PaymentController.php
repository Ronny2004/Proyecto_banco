<?php
// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $clients = Client::pluck('name', 'id');
        $payments = Payment::with('loan.client')->get(); // Asegúrate de que los pagos tienen una relación con los clientes

        return view('payments.index', compact('clients', 'payments'));
    }

    // Otros métodos...
}
