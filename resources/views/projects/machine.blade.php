<x-app-layout>
    <div class="max-w-4xl mx-auto p-4">
        <a href="{{ route('projects.viewFinished') }}"class="inline-block mb-4 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-800">
            <i class="fas fa-arrow-circle-left mr-1"></i> Volver
        </a>

        <h2 class="text-xl font-bold mb-4 text-gray-900 dark:text-white"> Maquinas de la obra finalizada: {{ $project->name }}</h2>

        @if($assignments->isEmpty())
            <p class="text-gray-800 dark:text-gray-200">No hay maquinas asignadas a esta obra.</p>
        @else
            <table class="min-w-full table-auto border-collapse border border-gray-300 dark:border-gray-600">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700">
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-900 dark:text-white">Numero de Serie</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-900 dark:text-white">Tipo de maquina</th>
                        <th class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-900 dark:text-white">Kilometros recorridos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assignments as $assignment)
                        <tr class="bg-white dark:bg-gray-800">
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-900 dark:text-white">{{ $assignment->machine->serial_number }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-900 dark:text-white">{{ $assignment->machine->machineType->name }}</td>
                            <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-gray-900 dark:text-white">{{ number_format($assignment->kilometers, 0, ',', '.') }} km</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
