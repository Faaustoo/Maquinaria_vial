<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        
        <a href="{{ route('machines.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
            ← Volver
        </a>

        <form action="{{ route('machines.store') }}" method="POST" class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="serial_number" class="block text-white font-semibold mb-1">Número de Serie</label>
                <input 
                    type="text" 
                    name="serial_number" 
                    id="serial_number"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="EXC-####" 
                    value="{{ old('serial_number') }}"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="model" class="block text-white font-semibold mb-1">Modelo</label>
                <input 
                    type="text" 
                    name="model" 
                    id="model"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                    placeholder="Modelo-####"
                    value="{{ old('model') }}"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="type_id" class="block text-white font-semibold mb-1">Máquina:</label>
                <select 
                    name="type_id" 
                    id="type_id"
                    class="w-full bg-gray-900 text-white border border-gray-600 rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="" disabled {{ old('type_id') ? '' : 'selected' }}>Seleccionar tipo de máquina</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->id }}" {{ old('type_id') == $tipo->id ? 'selected' : '' }}>
                            {{ $tipo->name }}
                        </option>
                    @endforeach
                </select> 
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Guardar cambios
            </button>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mt-4">
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
