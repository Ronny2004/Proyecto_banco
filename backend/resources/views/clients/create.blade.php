<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            {{ __('Crear Cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="surname" :value="__('Apellido')" />
                            <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" required />
                            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="id_number" :value="__('Número de Cédula')" />
                            <x-text-input id="id_number" class="block mt-1 w-full" type="text" name="id_number" required />
                            <x-input-error :messages="$errors->get('id_number')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="bank_balance" :value="__('Monto en Banco')" />
                            <x-text-input id="bank_balance" class="block mt-1 w-full" type="number" name="bank_balance" step="0.01" required />
                            <x-input-error :messages="$errors->get('bank_balance')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Teléfono')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="is_active" :value="__('Estado')" />
                            <x-select id="is_active" name="is_active" :options="[
                                '1' => __('Activo'),
                                '0' => __('Inactivo')
                            ]" />
                            <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Crear Cliente') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
