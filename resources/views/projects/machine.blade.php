<x-app-layout>
    <div class="max-w-4xl mx-auto p-4">
        <a href="{{ route('projects.viewFinished') }}"
           class="inline-block mb-4 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
            ← Volver a Obras Finalizadas
        </a>

        <h2 class="text-xl font-bold mb-4">Máquinas de la obra finalizada: {{ $project->name }}</h2>

        @if($assignments->isEmpty())
            <p>No hay máquinas asignadas a esta obra.</p>
        @else
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Modelo</th>
                        <th class="border border-gray-300 px-4 py-2">Número de Serie</th>
                        <th class="border border-gray-300 px-4 py-2">Kilómetros finales</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assignments as $assignment)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $assignment->machine->model }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $assignment->machine->serial_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $assignment->kilometers  }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
