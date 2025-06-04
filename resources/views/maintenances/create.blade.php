<x-app-layout>
    <div class="max-w-xl mx-auto p-4 text-white">

        <form action="{{ route('maintenances.store') }}" method="POST" class="bg-gray-800 p-4 rounded shadow">
            @csrf
            <div class="flex justify-end mb-3">
                <a href="{{ route('maintenances.index') }}" class="px-3 py-1 bg-gray-600 rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            <div class="mb-3">
                <label for="date" class="block font-semibold mb-1">Fecha</label>
                <input type="date" name="date" id="date" class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500"
                    value="{{ old('date') }}">
            </div>

            <div class="mb-3">
                <label for="kilometers" class="block font-semibold mb-1">Kilometros</label>
                <input type="number" name="kilometers" id="kilometers" class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500"
                    value="{{ old('kilometers') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="block font-semibold mb-1">Descripcion</label>
                <textarea name="description" id="description" rows="2"  class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500"
                    >{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="machine_id" class="block font-semibold mb-1">Maquina</label>
                <select name="machine_id" id="machine_id" class="w-full bg-gray-900 border border-gray-600 rounded p-2 focus:ring-blue-500">
                    <option value="" disabled {{ old('machine_id') ? '' : 'selected' }}>Seleccionar</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id') == $machine->id ? 'selected' : '' }}>
                            {{ $machine->serial_number }}
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
