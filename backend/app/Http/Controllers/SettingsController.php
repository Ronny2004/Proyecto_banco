<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = DB::table('settings')->first(); // Asumiendo que tienes una tabla de configuraciones
        return view('settings.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'interest_rate' => 'required|numeric|min:0',
        ]);

        DB::table('settings')->where('id', $id)->update($validated);

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
