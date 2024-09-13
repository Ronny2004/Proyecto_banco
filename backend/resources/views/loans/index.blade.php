<!-- resources/views/loans/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Préstamos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                    <a href="{{ route('loans.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md shadow-sm hover:bg-blue-600">
                        {{ __('Crear Préstamo') }}
                    </a>

                    <div class="mt-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Interés</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total a Pagar</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto Semanal</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Inicial</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Fin</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td class="px-6 py-4 border-b">{{ $loan->client->name }}</td>
                                        <td class="px-6 py-4 border-b">${{ number_format($loan->amount, 2) }}</td>
                                        <td class="px-6 py-4 border-b">{{ $loan->interest_rate }}%</td>
                                        <td class="px-6 py-4 border-b">${{ number_format($loan->totalapagar, 2) }}</td>
                                        <td class="px-6 py-4 border-b">${{ number_format($loan->weekly_payment, 2) ?? '0.00' }}</td>
                                        <td class="px-6 py-4 border-b">{{ \Carbon\Carbon::parse($loan->start_date)->format('Y-m-d') }}</td>
                                        <td class="px-6 py-4 border-b">{{ \Carbon\Carbon::parse($loan->end_date)->format('Y-m-d') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
