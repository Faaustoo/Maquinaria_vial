<x-app-layout>
    <div class="max-w-xl mx-auto p-2"> <!-- Igual que el formulario de máquinas -->
      
        <form action="{{ route('projects.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-4 rounded shadow"> <!-- p-6 a p-4 para igualar -->
            @csrf

            <div class="flex justify-end mb-4">
                <a href="{{ route('projects.index') }}" class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            <div class="mb-3"> <!-- mb-4 a mb-3 para igualar -->
                <label for="name" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm">Nombre</label> <!-- text-sm igual que máquinas -->
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" 
                     value="{{ old('name') }}"
            
                >
            </div>

            <div class="mb-3">
                <label for="start_date" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm">Fecha de inicio</label>
                <input 
                    type="date" 
                    name="start_date" 
                    id="start_date" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    value="{{ old('start_date') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="province_id" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm">Provincia</label>
                <select 
                    name="province_id" 
                    id="province_id" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    required
                >
                    <option value="" disabled {{ old('province_id') ? '' : 'selected' }}>Seleccione una provincia</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>
                            {{ $province->name }}
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
