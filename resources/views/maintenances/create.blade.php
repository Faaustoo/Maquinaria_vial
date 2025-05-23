<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('maintenances.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Volver
        </a>

        <form action="{{ route('maintenances.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Fecha</label>
                <input type="date" name="date" class="w-full border p-2" value="{{ old('date') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Kilometros</label>
                <input type="text" name="kilometers" class="w-full border p-2" value="{{ old('kilometers') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Descripcion</label>
                <input type="text" name="description" class="w-full border p-2" value="{{ old('description') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Maquina</label>
                <select name="machine_id" class="w-full border p-2">
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}">{{ $machine->serial_number }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded  hover:bg-blue-700">Guardar</button>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 mt-4">
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
