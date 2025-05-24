<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('maintenances.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
            ← Volver
        </a>

        <form action="{{ route('maintenances.store') }}" method="POST" class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="date" class="block text-white font-semibold mb-1">Fecha</label>
                <input 
                    type="date" 
                    name="date" 
                    id="date"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('date') }}"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="kilometers" class="block text-white font-semibold mb-1">Kilómetros</label>
                <input 
                    type="number" 
                    name="kilometers" 
                    id="kilometers"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('kilometers') }}"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="description" class="block text-white font-semibold mb-1">Descripción</label>
                <textarea 
                    name="description" 
                    id="description"
                    rows="3"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="machine_id" class="block text-white font-semibold mb-1">Máquina</label>
                <select 
                    name="machine_id" 
                    id="machine_id"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="" disabled {{ old('machine_id') ? '' : 'selected' }}>Seleccionar máquina</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id') == $machine->id ? 'selected' : '' }}>
                            {{ $machine->serial_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Guardar
            </button>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 mt-4 rounded">
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
