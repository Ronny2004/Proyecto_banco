<?php

// app/Http/Controllers/SettingsController.php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        // Mostrar todas las configuraciones
        return Setting::all();
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->value = $request->input('value');
        $setting->save();
        return response()->json($setting);
    }
}
