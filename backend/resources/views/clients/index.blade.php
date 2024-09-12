<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Socios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                    <a href="{{ route('clients.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-semibold text-sm rounded-md shadow-sm hover:bg-blue-600">
                        {{ __('Crear Socio') }}
                    </a>

                    <div class="mt-6">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cédula</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Monto en Banco</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Teléfono</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($clients as $client)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->name }} {{ $client->surname }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->id_number }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->bank_balance }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->phone }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->email }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $client->is_active ? 'Activo' : 'Inactivo' }}
                                        </td>
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
