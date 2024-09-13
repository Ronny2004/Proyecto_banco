<!-- resources/views/pagos/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Registrar Pagos y Actividades') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                    <!-- Tabs Navigation -->
                    <div class="flex space-x-4 border-b border-gray-200 dark:border-gray-700">
                        <button class="py-2 px-4 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none" onclick="showTab('pagos')">Pagos de Préstamos</button>
                        <button class="py-2 px-4 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none" onclick="showTab('ahorro')">Ahorro Semanal</button>
                        <button class="py-2 px-4 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none" onclick="showTab('actividad')">Actividad Semanal</button>
                    </div>

                    <!-- Tabs Content -->
                    <div id="tab-content">
                        <!-- Pagos de Préstamos Tab -->
                        <div id="payments" class="tab-content hidden">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Registrar Pago de Préstamo Semanal</h3>
                            <form action="{{ route('payments.store') }}" method="POST" class="mt-4">
                                @csrf
                                <div>
                                    <x-input-label for="client_id" :value="__('Cliente')" />
                                    <select id="client_id" name="client_id" required class="block mt-1 w-full" onchange="updateWeeklyAmount()">
                                        <option value="">{{ __('Seleccione un cliente') }}</option>
                                        @foreach($clients as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Monto</label>
                                    <input type="number" id="amount" name="amount" value="1" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" readonly>
                                    @error('amount')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Pago</button>
                            </form>

                            <!-- Tabla de Pagos Realizados -->
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-8">Pagos Realizados</h3>
                            <table class="min-w-full divide-y divide-gray-200 mt-4">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td class="px-6 py-4">{{ $payment->loan->client->name }}</td>
                                            <td class="px-6 py-4">${{ number_format($payment->amount, 2) }}</td>
                                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($payment->date)->format('Y-m-d') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Ahorro Semanal Tab -->
                        <div id="ahorro" class="tab-content hidden">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Registrar Ahorro Semanal</h3>
                            <form action="{{ route('ahorros.store') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                                    <select id="cliente_id" name="cliente_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                        <option value="">Seleccione un cliente</option>
                                        @foreach ($clients as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cliente_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Monto</label>
                                    <input type="number" id="amount" name="amount" value="{{ old('amount') }}" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    @error('amount')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Ahorro</button>
                            </form>
                        </div>

                        <!-- Actividad Semanal Tab -->
                        <div id="actividad" class="tab-content hidden">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Registrar Actividad Semanal</h3>
                            <form action="{{ route('actividad.store') }}" method="POST" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion" value="{{ old('descripcion') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                                    @error('descripcion')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Monto</label>
                                    <input type="number" id="amount" name="amount" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" readonly>
                                    @error('amount')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Registrar Actividad</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabId) {
            // Oculta todos los contenidos de las pestañas
            document.querySelectorAll('.tab-content').forEach(content => content.classList.add('hidden'));
            
            // Muestra el contenido de la pestaña seleccionada
            document.getElementById(tabId).classList.remove('hidden');
        }

        // Muestra la primera pestaña por defecto
        showTab('pagos');

        async function updateWeeklyAmount() {
            const clientId = document.getElementById('client_id').value;

            if (!clientId) {
                document.getElementById('amount').value = '';
                return;
            }

            try {
                // Solicita el monto semanal desde el backend
                const response = await fetch(`/api/loan/${clientId}/weekly-amount`);
                const data = await response.json();

                if (response.ok) {
                    document.getElementById('amount').value = data.weeklyAmount;
                } else {
                    console.error('Error fetching weekly amount:', data.message);
                }
            } catch (error) {
                console.error('Error fetching weekly amount:', error);
            }
        }
    </script>
</x-app-layout>
