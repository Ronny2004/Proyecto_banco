<?php
// app/Http/Controllers/LoanController.php
namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Client;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::with('client')->get();
        return response()->json($loans);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'amount' => 'required|numeric',
            'interest_rate' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $loan = Loan::create($request->all());
        return response()->json($loan, 201);
    }

    public function show($id)
    {
        $loan = Loan::with('client')->findOrFail($id);
        return response()->json($loan);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'exists:clients,id',
            'amount' => 'numeric',
            'interest_rate' => 'numeric',
            'start_date' => 'date',
            'end_date' => 'date',
        ]);

        $loan = Loan::findOrFail($id);
        $loan->update($request->all());
        return response()->json($loan);
    }

    public function destroy($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        return response()->json(null, 204);
    }
}
