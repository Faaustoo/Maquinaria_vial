<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('assignments.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            ← Volver
        </a>

        <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-1" for="start_date">Fecha de inicio</label>
                <input 
                    type="date" 
                    name="start_date" 
                    id="start_date"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ old('start_date', $assignment->start_date) }}"
                    required
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-1" for="machine_id">Máquina</label>
                <select 
                    name="machine_id" 
                    id="machine_id"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" {{ old('machine_id', $assignment->machine_id) == $machine->id ? 'selected' : '' }}>
                            {{ $machine->serial_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200 mb-1" for="project_id">Proyecto</label>
                <select 
                    name="project_id" 
                    id="project_id"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id', $assignment->project_id) == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition"
            >
                Guardar cambios
            </button>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 mt-4 rounded">
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
