<!-- resources/views/loans/manage-single.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Préstamo</h1>
    
    <!-- Información del préstamo -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Información del Préstamo</h5>
        </div>
        <div class="card-body">
            <p><strong>Cliente:</strong> {{ $loan->client->name }}</p>
            <p><strong>Monto Total:</strong> ${{ number_format($loan->amount, 2) }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ \Carbon\Carbon::parse($loan->start_date)->format('Y-m-d') }}</p>
            <p><strong>Fecha de Fin:</strong> {{ \Carbon\Carbon::parse($loan->end_date)->format('Y-m-d') }}</p>
            <p><strong>Cantidad Semanal:</strong> ${{ number_format($weeklyAmount, 2) }}</p>
            <p><strong>Total de Semanas:</strong> {{ $totalWeeks }}</p>
        </div>
    </div>

    <!-- Pagos Semanales -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Pagos Semanales</h5>
        </div>
        <div class="card-body">
            @if ($weeklyPayments->isEmpty())
                <p>No hay pagos registrados para este préstamo.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Semana</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($weeklyPayments as $weekStart => $amount)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($weekStart)->format('d-m-Y') }}</td>
                                <td>${{ number_format($amount, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <!-- Total Acumulado -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Total Acumulado</h5>
        </div>
        <div class="card-body">
            <p><strong>Total de Pagos:</strong> ${{ number_format($totalAmount, 2) }}</p>
        </div>
    </div>
</div>
@endsection
