<x-app-layout>
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8 space-y-6"> <!-- ancho máximo más pequeño y centrado -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">  <!-- opcional para centrar el contenido interno -->
                    
                    @if (session('success'))
                        <div id="success-message" class="bg-green-700 text-white p-4 rounded mb-4 shadow">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Parámetro de mantenimiento') }}
                    </h2>

                    <form method="POST" action="{{ route('parameters.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="value" :value="__('Valor de mantenimiento (ej: 5000)')" />
                            <x-text-input id="value" name="value" type="number" class="mt-1 block w-full"
                                          :value="old('value', $parameter->value)" required autofocus />
                            <x-input-error :messages="$errors->get('value')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Guardar') }}</x-primary-button>
                        </div>

                        @if ($errors->any())
                            <div class="bg-red-100 text-red-700 p-3 rounded mt-3 text-sm">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>- {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
