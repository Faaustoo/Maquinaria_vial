<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('maintenances.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Volver
        </a>

        <form action="{{ route('maintenances.update', $maintenance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="date" class="block text-gray-700 dark:text-gray-200 mb-1">Fecha de mantenimiento</label>
                <input 
                    type="date" 
                    id="date" 
                    name="date" 
                    value="{{ old('date', $maintenance->date) }}" 
                    class="w-full border rounded p-2"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="kilometers" class="block text-gray-700 dark:text-gray-200 mb-1">Kilómetros</label>
                <input 
                    type="number" 
                    id="kilometers" 
                    name="kilometers" 
                    value="{{ old('kilometers', $maintenance->kilometers) }}" 
                    class="w-full border rounded p-2"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 dark:text-gray-200 mb-1">Descripción</label>
                <textarea 
                    id="description" 
                    name="description" 
                    class="w-full border rounded p-2" 
                    required
                >{{ old('description', $maintenance->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="machine_id" class="block text-gray-700 dark:text-gray-200 mb-1">Máquina (N° de serie)</label>
                <select 
                    id="machine_id" 
                    name="machine_id" 
                    class="w-full border rounded p-2" 
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

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                Guardar cambios
            </button>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mt-4">
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
