<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Crear Préstamo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                    <form method="POST" action="{{ route('loans.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="client_id" :value="__('Cliente')" />
                            <x-select id="client_id" name="client_id" :options="$clients->pluck('name', 'id')" required />
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="amount" :value="__('Monto')" />
                            <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" step="0.01" required />
                            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="interest_rate" :value="__('Interés (%)')" />
                            <x-text-input id="interest_rate" class="block mt-1 w-full" type="number" name="interest_rate" step="0.01" />
                            <x-input-error :messages="$errors->get('interest_rate')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="start_date" :value="__('Fecha de Inicio')" />
                            <x-text-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" required />
                            <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="end_date" :value="__('Fecha de Fin')" />
                            <x-text-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" required />
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Crear Préstamo') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
