<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('projects.index') }}" 
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            ← Volver
        </a>

        <h2 class="text-xl font-bold mb-6 text-gray-900 dark:text-gray-100">
            Finalizar Obra: {{ $project->name }}
        </h2>

        {{-- Mostrar errores --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('projects.finish', $project->id) }}" 
              class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 dark:text-gray-200 mb-1 font-semibold">
                    Fecha de finalización:
                </label>
                <input 
                    type="date" 
                    name="end_date" 
                    id="end_date"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <div class="mb-6">
                <label for="reason_id" class="block text-gray-700 dark:text-gray-200 mb-1 font-semibold">
                    Motivo de finalización:
                </label>
                <select 
                    name="reason_id" 
                    id="reason_id"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    <option value="" disabled selected>Seleccione un motivo</option>
                    @foreach($endReasons as $reason)
                        <option value="{{ $reason->id }}">{{ $reason->description }}</option>
                    @endforeach
                </select>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition"
            >
                Finalizar Obra
            </button>
        </form>
    </div>
</x-app-layout>
