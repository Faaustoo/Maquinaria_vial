<x-app-layout>
    <div class="max-w-xl mx-auto p-4 mt-6">

        <div class="bg-white dark:bg-gray-800 rounded shadow p-4">

            <form action="{{ route('assignments.finish', $assignment->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('POST')
                <div class="flex justify-end mb-0">
                <a href="{{ route('assignments.index') }}" class="inline-block px-2 py-0 bg-gray-600 text-white rounded hover:bg-gray-700 transition leading-none">
                    <i class="fas fa-times text-lg"></i>
                </a>
                </div>



                <h2 class="text-2xl font-semibold mb-6 text-gray-900 dark:text-gray-100">Terminar asignación</h2>

                <div class="mb-3">
                    <label for="end_date" class="block text-gray-700 dark:text-gray-200 mb-1 font-semibold text-sm">Fecha de finalización</label>
                    <input 
                        type="date" 
                        id="end_date" 
                        name="end_date" 
                        value="{{ old('end_date', now()->toDateString()) }}" 
                        class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    >
                </div>

                <div class="mb-3">
                    <label for="kilometers" class="block text-gray-700 dark:text-gray-200 mb-1 font-semibold text-sm">Kilómetros recorridos</label>
                    <input 
                        type="number" 
                        id="kilometers" 
                        name="kilometers" 
                        value="{{ old('kilometers') }}" 
                        class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    >
                </div>
                
                <button type="submit" class="w-full bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition text-sm">
                    Guardar cambios
                </button>

                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 mt-4 rounded text-sm">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </form>
        </div>
    </div>
</x-app-layout>
