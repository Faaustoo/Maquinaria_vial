<x-app-layout>
    <x-slot name="header">
        <h2>Agregar nueva máquina</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4">
        <form action="{{ route('machines.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Número de Serie </label>
                <input 
                    type="text" 
                    name="serial_number" 
                    class="w-full border rounded p-2" 
                    placeholder="EXC-####" 
                    value="{{ old('serial_number') }}"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Modelo </label>
                <input 
                    type="text" 
                    name="model" 
                    class="w-full border rounded p-2" 
                    placeholder="Modelo-####"
                    value="{{ old('model') }}"
                >
            </div>

            <div class="mb-4">
                <select name="type_id" class="w-full border rounded p-2">
                    <option value="" disabled {{ old('type_id') ? '' : 'selected' }}>Seleccionar tipo de máquina</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('type_id') == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->name }}
                        </option>
                    @endforeach
                </select> 
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </form>
    </div>
</x-app-layout>
