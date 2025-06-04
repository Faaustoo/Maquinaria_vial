<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        

        <form action="{{ route('machines.update', $machine->id) }}" method="POST" class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')

             <div class="flex justify-end mb-4">
                <a href="{{ route('machines.index') }}" class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            <div class="mb-4">
                <label for="serial_number" class="block text-white font-semibold mb-1">Número de Serie</label>
                <input type="text" name="serial_number" id="serial_number" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"  
                    value="{{ old('serial_number', $machine->serial_number) }}"  >
            </div>

            <div class="mb-4">
                <label for="model" class="block text-white font-semibold mb-1">Modelo</label>
                <input type="text" name="model"  id="model" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('model', $machine->model) }}">
            </div>

            <div class="mb-3">
                <label for="email" class="block text-white font-semibold mb-1 text-sm">Responsable (Email)</label>
                <input type="email" name="email" id="email" class="w-full bg-gray-900 text-white border border-gray-600 rounded p-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    value="{{ old('email', $machine->email) }}">
            </div>


            <div class="mb-4">
                <label for="type_id" class="block text-white font-semibold mb-1">Tipo de Máquina</label>
                <select  name="type_id"  id="type_id"   class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ $tipo->id == old('type_id', $machine->type_id) ? 'selected' : '' }}>
                            {{ $tipo->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"> Guardar cambios </button>

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
