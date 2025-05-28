<x-app-layout>
    <div class="max-w-xl mx-auto p-2">
        <form action="{{ route('machines.store') }}" method="POST" class="bg-yellow dark:bg-gray-800 p-4 rounded shadow">
            @csrf

            <div class="flex justify-end mb-4">
                <a href="{{ route('machines.index') }}" class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            <div class="mb-3">
                <label for="serial_number" class="block text-white font-semibold mb-1 text-sm">Número de Serie</label>
                <input type="text" name="serial_number" id="serial_number" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="ABC-####" value="{{ old('serial_number') }}">
            </div>

            <div class="mb-3">
                <label for="model" class="block text-white font-semibold mb-1 text-sm">Modelo</label>
                <input type="text" name="model" id="model" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Modelo-####" value="{{ old('model') }}">
            </div>

            <div class="mb-3">
                <label for="kilometers" class="block text-white font-semibold mb-1 text-sm">Kilómetros</label>
                <input type="number" name="kilometers" id="kilometers" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('kilometers') }}">
            </div>

            <div class="mb-3">
                <label for="type_id" class="block text-white font-semibold mb-1 text-sm">Máquina</label>
                <select name="type_id" id="type_id" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" disabled {{ old('type_id') ? '' : 'selected' }}>Seleccionar tipo de máquina</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('type_id') == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition text-sm">Guardar cambios</button>

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
</x-app-layout>

