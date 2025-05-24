<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('projects.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            ← Volver
        </a>

        <form action="{{ route('projects.update', $project->id) }}" method="POST" 
              class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')

            <!-- Nombre -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-200 mb-1 font-semibold">Nombre</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    value="{{ old('name', $project->name) }}" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- Fecha de inicio -->
            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 dark:text-gray-200 mb-1 font-semibold">Fecha de inicio</label>
                <input 
                    type="date" 
                    id="start_date" 
                    name="start_date" 
                    value="{{ old('start_date', $project->start_date) }}" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <!-- Provincia -->
            <div class="mb-4">
                <label for="province_id" class="block text-gray-700 dark:text-gray-200 mb-1 font-semibold">Provincia</label>
                <select 
                    id="province_id" 
                    name="province_id" 
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    @foreach($provinces as $province)
                        <option value="{{ $province->id }}" 
                            {{ old('province_id', $project->province_id) == $province->id ? 'selected' : '' }}>
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botón de guardar -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Guardar cambios
            </button>

            <!-- Errores de validación -->
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
