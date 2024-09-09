<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Configuraciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Ajusta las configuraciones de la aplicación.
                    </h3>

                    <!-- Formulario de configuraciones -->
                    <div class="mt-6">
                        <form action="{{ route('settings.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <!-- Ejemplo de campos de configuración -->
                            <div class="mb-4">
                                <label for="site_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ __('Nombre del Sitio') }}
                                </label>
                                <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings->site_name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-indigo-500 dark:focus:border-indigo-500">
                                @error('site_name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Otros campos de configuración pueden ser agregados aquí -->

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700">
                                    {{ __('Guardar Cambios') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
