<x-app-layout>
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Crear Préstamo</h2>
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-4 border-b">Cliente</th>
                        <th class="px-6 py-4 border-b">Monto</th>
                        <th class="px-6 py-4 border-b">Interés</th>
                        <th class="px-6 py-4 border-b">Total Prestado</th>
                        <th class="px-6 py-4 border-b">Total a Pagar</th>
                        <th class="px-6 py-4 border-b">Monto Mensual</th>
                        <th class="px-6 py-4 border-b">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $loan)
                        <tr>
                            <td class="px-6 py-4 border-b">{{ $loan->client->name ?? 'N/A' }}</td>
                            <td class="px-6 py-4 border-b">${{ number_format($loan->amount, 2) }}</td>
                            <td class="px-6 py-4 border-b">{{ number_format($loan->interest_rate, 2) }}%</td>
                            <td class="px-6 py-4 border-b">${{ number_format($loan->total_borrowed, 2) ?? 'N/A' }}</td>
                            <td class="px-6 py-4 border-b">${{ number_format($loan->total_to_pay, 2) ?? 'N/A' }}</td>
                            <td class="px-6 py-4 border-b">${{ number_format($loan->monthly_payment, 2) ?? '0.00' }}</td>
                            <td class="px-6 py-4 border-b">
                                {{ $loan->date ? $loan->date->format('Y-m-d') : 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
