<x-app-layout>
    <div class="max-w-xl mx-auto p-6 mt-6">

        <a href="{{ route('assignments.index') }}" 
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            ← Volver
        </a>

        <div class="bg-white dark:bg-gray-800 rounded shadow p-6">
            <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-gray-100">Terminar asignación</h2>

            <form action="{{ route('assignments.finish', $assignment->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('POST') {{-- o PUT, según tu ruta --}}

                <div>
                    <label for="end_date" class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Fecha de finalización</label>
                    <input 
                        type="date" 
                        id="end_date" 
                        name="end_date" 
                        min="{{ $assignment->start_date }}" 
                        value="{{ old('end_date', now()->toDateString()) }}" 
                        required
                        class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('end_date') border-red-500 @enderror"
                    >
                    @error('end_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kilometers" class="block text-gray-700 dark:text-gray-200 font-medium mb-1">Kilómetros recorridos</label>
                    <input 
                        type="number" 
                        id="kilometers" 
                        name="kilometers" 
                        min="0" 
                        value="{{ old('kilometers') }}" 
                        required
                        class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100
                               focus:outline-none focus:ring-2 focus:ring-blue-500
                               @error('kilometers') border-red-500 @enderror"
                    >
                    @error('kilometers')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" 
                        class="w-full px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Guardar cambios
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
