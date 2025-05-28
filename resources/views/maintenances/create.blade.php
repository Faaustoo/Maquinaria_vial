<x-app-layout>
    <div class="max-w-xl mx-auto p-4 text-white">

        <form action="{{ route('maintenances.store') }}" method="POST" class="bg-gray-800 p-4 rounded shadow">
            @csrf

            {{-- Botón para volver --}}
            <div class="flex justify-end mb-3">
                <a href="{{ route('maintenances.index') }}" class="px-3 py-1 bg-gray-600 rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            {{-- Fecha --}}
            <div class="mb-3">
                <label for="date" class="block font-semibold mb-1">Fecha</label>
                <input 
                    type="date" 
                    name="date" 
                    id="date"
                    value="{{ old('date') }}"
                    required
                    class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500"
                >
            </div>

            {{-- Kilómetros --}}
            <div class="mb-3">
                <label for="kilometers" class="block font-semibold mb-1">Kilómetros</label>
                <input 
                    type="number" 
                    name="kilometers" 
                    id="kilometers"
                    value="{{ old('kilometers') }}"
                    required
                    class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500"
                >
            </div>

            {{-- Descripción --}}
            <div class="mb-3">
                <label for="description" class="block font-semibold mb-1">Descripción</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="2"
                    required
                    class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500"
                >{{ old('description') }}</textarea>
            </div>

            {{-- Máquina --}}
            <div class="mb-3">
                <label for="machine_id" class="block font-semibold mb-1">Máquina</label>
                <select 
                    name="machine_id" 
                    id="machine_id" 
                    required
                    class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500"
                >
                    <option value="" disabled {{ old('machine_id') ? '' : 'selected' }}>Seleccionar</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id') == $machine->id ? 'selected' : '' }}>
                            {{ $machine->serial_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition text-sm">Guardar cambios</button>

            {{-- Errores --}}
            @if ($errors->any())
                <div class="bg-red-700 text-white p-3 mt-4 rounded text-sm">
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
