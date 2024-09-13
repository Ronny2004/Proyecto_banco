<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        ¡Bienvenido a tu Panel de Control!
                    </h3>
                    <p class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                        Aquí puedes gestionar las distintas funcionalidades de tu aplicación.
                    </p>

                    <!-- Enlaces a funcionalidades -->
                    <div class="mt-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <!-- Tarjeta: Préstamos -->
                            <a href="{{ url('/loans') }}" class="block p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:bg-gray-200 dark:hover:bg-gray-600">
                                <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                    Préstamos
                                </h4>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">
                                    Gestiona los registros de préstamos aquí.
                                </p>
                            </a>

                            <!-- Tarjeta: Clientes -->
                            <a href="{{ url('/clients') }}" class="block p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:bg-gray-200 dark:hover:bg-gray-600">
                                <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                    Socios
                                </h4>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">
                                    Visualiza y gestiona los detalles de los Socios.
                                </p>
                            </a>

                            <!-- Tarjeta: Configuraciones -->
                            <a href="{{ url('/settings') }}" class="block p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:bg-gray-200 dark:hover:bg-gray-600">
                                <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                    Configuraciones
                                </h4>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">
                                    Ajusta la configuración de tu aplicación.
                                </p>
                            </a>

                                <!-- Tarjeta: Pagos -->
                                <a href="{{ url('/payments') }}" class="block p-6 bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:bg-gray-200 dark:hover:bg-gray-600">
                                <h4 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                    Registrar Pagos
                                </h4>
                                <p class="mt-2 text-gray-600 dark:text-gray-400">
                                    Registra los pagos de prestamos, ahorros y actividad semanal de los socios y el banco.
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
