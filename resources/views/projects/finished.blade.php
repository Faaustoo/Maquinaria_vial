<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
        <div class="mb-4">
            <a href="{{ route('projects.index') }}"
               class="inline-block px-4 py-2 bg-gray-600 text-white font-semibold rounded hover:bg-gray-700 transition">
                ← Volver a Obras Activas
            </a>
        </div>

        <h3 class="text-lg font-semibold text-center mb-4 text-white">Obras Finalizadas</h3>

        <div class="bg-gray-800 p-6 rounded shadow">
            @if ($projects->isEmpty())
                <p class="text-white text-center">No hay obras finalizadas para mostrar.</p>
            @else
                <table class="min-w-full table-auto border border-gray-700 rounded overflow-hidden">
                    <thead>
                        <tr class="bg-gray-700">
                            <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Nombre</th>
                            <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha de inicio</th>
                            <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha de fin</th>
                            <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Motivo</th>
                            <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Provincia</th>
                            <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="hover:bg-gray-200 hover:text-black transition">
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->start_date }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->end_date }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->endReason->description }}</td> 
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->province->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-700 whitespace-nowrap">
                                    <a href="{{ route('showFinishedMachines', $project->id) }}" 
                                       class="text-blue-400 hover:text-blue-600 font-semibold transition">
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
