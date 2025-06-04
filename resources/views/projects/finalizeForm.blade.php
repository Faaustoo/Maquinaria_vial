<x-app-layout>
    <div class="max-w-xl mx-auto p-2"> <
        <form method="POST" action="{{ route('projects.finish', $project->id) }}" 
              class="bg-white dark:bg-gray-800 p-4 rounded shadow"> 
            @csrf

            <div class="flex justify-end mb-4">
                <a href="{{ route('projects.index') }}"class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Finalizar Obra: {{ $project->name }}</h2>

            <div class="mb-3">
                <label for="end_date" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm font-semibold">Fecha de finalizacion</label>
                <input type="date" name="end_date" id="end_date"class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"">
            </div>
            
           <div class="mb-3">
                <label for="reason_id" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm font-semibold">Motivo de finalización</label>
                <select id="reason_id" name="reason_id" class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <option value="" disabled {{ old('reason_id') ? '' : 'selected' }}>Seleccione un motivo</option>
                    @foreach($endReasons as $reason)
                        <option value="{{ $reason->id }}" {{ old('reason_id') == $reason->id ? 'selected' : '' }}>
                            {{ $reason->description }}
                        </option>
                    @endforeach
                </select>
            </div>



            <button type="submit" class="w-full bg-blue-600 text-white px-3 py-1.5 rounded hover:bg-blue-700 transition text-sm">Finalizar </button>
            
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
