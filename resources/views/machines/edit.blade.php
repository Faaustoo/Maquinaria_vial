<x-app-layout>

    <div class="max-w-2xl mx-auto p-4">
        <form action="{{ route('machines.update', $machine->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Número de Serie</label>
                <input 
                    type="text" 
                    name="serial_number" 
                    class="w-full border rounded p-2" 
                    value="{{ old('serial_number', $machine->serial_number) }}"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Modelo</label>
                <input 
                    type="text" 
                    name="model" 
                    class="w-full border rounded p-2" 
                    value="{{ old('model', $machine->model) }}"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Tipo de Máquina</label>
                <select name="type_id" class="w-full border rounded p-2">
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ $tipo->id == old('type_id', $machine->type_id) ? 'selected' : '' }}>
                            {{ $tipo->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded border border-black hover:bg-blue-600">
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
