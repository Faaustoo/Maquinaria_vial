<x-app-layout>
    <div class="max-w-2xl mx-auto p-4">
        <a href="{{ route('assignments.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            ← Volver
        </a>

        <form action="{{ route('assignments.update', $assignment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Fecha de inicio</label>
                <input 
                    type="date" 
                    name="start_date" 
                    class="w-full border rounded p-2" 
                    value="{{ old('start_date', $assignment->start_date) }}"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Fecha de finalización</label>
                <input 
                    type="date" 
                    name="end_date" 
                    class="w-full border rounded p-2" 
                    value="{{ old('end_date', $assignment->end_date) }}"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Kilómetros</label>
                <input 
                    type="number" 
                    name="kilometers" 
                    class="w-full border rounded p-2" 
                    value="{{ old('kilometers', $assignment->kilometers) }}"
                >
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Máquina</label>
                <select name="machine_id" class="w-full border p-2">
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}" 
                            {{ old('machine_id', $assignment->machine_id) == $machine->id ? 'selected' : '' }}>
                            {{ $machine->serial_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-200">Proyecto</label>
                <select name="project_id" class="w-full border p-2">
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" 
                            {{ old('project_id', $assignment->project_id) == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded border border-black hover:bg-blue-600">
                Guardar cambios
            </button>

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
