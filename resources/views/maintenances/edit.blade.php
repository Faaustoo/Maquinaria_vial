<x-app-layout>
    <div class="max-w-xl mx-auto p-3"> <!-- menos padding general -->

        <form action="{{ route('maintenances.update', $maintenance->id) }}" method="POST" class="bg-yellow dark:bg-gray-800 p-3 rounded shadow"> <!-- p-4 a p-3 -->
            @csrf
            @method('PUT')

            <div class="flex justify-end mb-3"> <!-- mb-4 a mb-3 -->
                <a href="{{ route('maintenances.index') }}"
                   class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-lg"></i> <!-- text-xl a text-lg -->
                </a>
            </div>

            <div class="mb-3"> <!-- mb-4 a mb-3 -->
                <label for="date" class="block text-white font-semibold mb-1">Fecha de mantenimiento</label>
                <input 
                    type="date" 
                    id="date" 
                    name="date" 
                    value="{{ old('date', $maintenance->date) }}" 
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="kilometers" class="block text-white font-semibold mb-1">Kilómetros</label>
                <input 
                    type="number" 
                    id="kilometers" 
                    name="kilometers" 
                    value="{{ old('kilometers', $maintenance->kilometers) }}" 
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="description" class="block text-white font-semibold mb-1">Descripción</label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="3"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >{{ old('description', $maintenance->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="machine_id" class="block text-white font-semibold mb-1">Máquina (N° de serie)</label>
                <select 
                    id="machine_id" 
                    name="machine_id" 
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    @foreach($machines as $machine)
                        <option value="{{ $machine->id }}" 
                            {{ old('machine_id', $maintenance->machine_id) == $machine->id ? 'selected' : '' }}
                        >
                            {{ $machine->serial_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-2 py-1.5 rounded hover:bg-blue-700 transition">Guardar cambios</button> <!-- padding menos alto -->

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mt-3">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
</x-app-layout>
