<x-app-layout>
    <div class="max-w-xl mx-auto p-3"> 

        <form action="{{ route('maintenances.update', $maintenance->id) }}" method="POST" class="bg-yellow dark:bg-gray-800 p-3 rounded shadow"> <!-- p-4 a p-3 -->
            @csrf
            @method('PUT')

            <div class="flex justify-end mb-3"> 
                <a href="{{ route('maintenances.index') }}"
                   class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-lg"></i>
                </a>
            </div>

            <div class="mb-3"> 
                <label for="date" class="block text-white font-semibold mb-1">Fecha de mantenimiento</label>
                <input type="date"  id="date" name="date" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('date', $maintenance->date) }}" >
            </div>

            <div class="mb-3">
                <label for="kilometers" class="block text-white font-semibold mb-1">Kilometros</label>
                <input type="number" id="kilometers" name="kilometers" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('kilometers', $maintenance->kilometers) }}" >
            </div>

            <div class="mb-3">
                <label for="description" class="block text-white font-semibold mb-1">Descripcion</label>
                <textarea id="description" name="description" rows="3"class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    {{ old('description', $maintenance->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="machine_id" class="block text-white font-semibold mb-1">Maquina (N° de serie)</label>
                <select id="machine_id" name="machine_id" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach($machines as $machine)
                        <option value="{{ $machine->id }}" 
                            {{ old('machine_id', $maintenance->machine_id) == $machine->id ? 'selected' : '' }}>
                            {{ $machine->serial_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-2 py-1.5 rounded hover:bg-blue-700 transition">Guardar cambios</button> <!-- padding menos alto -->

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
