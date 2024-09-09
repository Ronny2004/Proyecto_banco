<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        $clientsOptions = Client::pluck('name', 'id'); // Suponiendo que tienes un modelo Client y quieres obtener una lista de clientes
        return view('clients.create', compact('clientsOptions'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'id_number' => 'required|unique:clients',
            // otras reglas de validación
        ]);
    
        Client::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'id_number' => $request->input('id_number'),
            'bank_balance' => $request->input('bank_balance'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'is_active' => $request->input('is_active'),
        ]);
    
        return redirect()->route('clients.index');
    }
    

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'id_number' => 'required|string|max:20|unique:clients,id_number,' . $id,
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $id,
            'bank_balance' => 'required|numeric',
            'is_active' => 'required|boolean',
        ]);

        $client = Client::findOrFail($id);
        $client->update($validated);

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
