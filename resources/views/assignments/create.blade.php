<x-app-layout>
    <div class="max-w-xl mx-auto p-2">
        <form action="{{ route('assignments.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-4 rounded shadow">
            @csrf

            <div class="flex justify-end mb-4">
                <a href="{{ route('assignments.index') }}" class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                    <i class="fas fa-times text-xl"></i>
                </a>
            </div>

            <div class="mb-3">
                <label for="start_date" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm font-semibold">Fecha de inicio</label>
                <input type="date" name="start_date" id="start_date" class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm"
                    value="{{ old('start_date') }}">
            </div>

            <div class="mb-3">
                <label for="machine_id" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm font-semibold">Maquina</label>
                <select name="machine_id" id="machine_id" class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <option value="" disabled selected>Seleccionar</option>
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id') == $machine->id ? 'selected' : '' }}>
                            {{ $machine->serial_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="project_id" class="block text-gray-700 dark:text-gray-200 mb-1 text-sm font-semibold">Obra</label>
                <select name="project_id" id="project_id" class="w-full border border-gray-300 dark:border-gray-600 rounded p-1.5 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                    <option value="" disabled selected>Seleccionar</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
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
