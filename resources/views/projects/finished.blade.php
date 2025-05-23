<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('projects.index') }}"
               class="inline-block px-4 py-2 bg-gray-600 text-white font-semibold rounded hover:bg-gray-700">
                ← Volver a Obras Activas
            </a>
        </div>

        <h3 class="text-lg font-semibold text-center mb-4 text-white">Obras Finalizadas</h3>

        <div class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            @if ($projects->isEmpty())
                <p class="text-white text-center">No hay obras finalizadas para mostrar.</p>
            @else
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700">
                            <th class="py-2 px-4 border-b text-left text-white">Nombre</th>
                            <th class="py-2 px-4 border-b text-left text-white">Fecha de inicio</th>
                            <th class="py-2 px-4 border-b text-left text-white">Fecha de fin</th>
                            <th class="py-2 px-4 border-b text-left text-white">Motivo</th>
                            <th class="py-2 px-4 border-b text-left text-white">Provincia</th>
                            <th class="py-2 px-4 border-b text-left text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="text-white hover:bg-white hover:text-black">
                                <td class="py-2 px-4 border-b">{{ $project->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $project->start_date }}</td>
                                <td class="py-2 px-4 border-b">{{ $project->end_date }}</td>
                                <td class="py-2 px-4 border-b">{{ $project->endReason->description }}</td> 
                                <td class="py-2 px-4 border-b">{{ $project->province->name }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('showFinishedMachines', $project->id) }}" 
   class="text-blue-800 hover:text-blue-500 mr-4">
   Ver Máquinas
</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
