<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BalanceController; // Añadido para el balance
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AhorroController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas para perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rutas para préstamos
    Route::get('/loans', [LoanController::class, 'index'])->name('loans.index');
    Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/loans/{id}/edit', [LoanController::class, 'edit'])->name('loans.edit');
    Route::put('/loans/{id}', [LoanController::class, 'update'])->name('loans.update');
    Route::delete('/loans/{id}', [LoanController::class, 'destroy'])->name('loans.destroy');
    Route::get('/loans/manage/{loan}', [LoanController::class, 'manageSingle'])->name('loans.manageSingle');
    Route::get('/loan/{clientId}/weekly-amount', [LoanController::class, 'getWeeklyAmount']);

    
    // Rutas para clientes
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    
    // Rutas para configuraciones
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings/{id}', [SettingsController::class, 'update'])->name('settings.update');

    // Rutas para balance
    Route::get('/balance', [BalanceController::class, 'index'])->name('balance.index');

    // Rutas para el registro de pagos
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    

    // Rutas para el registro de ahorros
    Route::post('/ahorros', [AhorroController::class, 'store'])->name('ahorros.store');


    // Rutas para el registro de actividad semanal
    Route::post('/actividad', [ActivityController::class, 'store'])->name('actividad.store');
});

require __DIR__.'/auth.php';
