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
                    <form method="POST" action="{{ route('settings.update', $settings->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mt-4">
                            <x-input-label for="interest_rate" :value="__('Tasa de Interés (%)')" />
                            <x-text-input id="interest_rate" class="block mt-1 w-full" type="number" name="interest_rate" step="0.01" value="{{ $settings->interest_rate }}" required />
                            <x-input-error :messages="$errors->get('interest_rate')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Actualizar Configuración') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
