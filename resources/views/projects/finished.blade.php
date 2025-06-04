<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
        <div class="mb-4">
            <a href="{{ route('projects.index') }}" class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                <i class="fas fa-arrow-circle-left mr-1"></i> Volver
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
                            <th class="py-2 px-4 border-b border-gray-600  text-center text-white ">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="hover:bg-gray-200 hover:text-black transition">
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{\Carbon\Carbon::parse($project->start_date)->format('d/m/Y')  }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{ \Carbon\Carbon::parse($project->end_date)->format('d/m/Y') }}</td>
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->endReason->description }}</td> 
                                <td class="py-2 px-4 border-b border-gray-700">{{ $project->province->name }}</td>
                                <td class="py-2 px-4 border-b border-gray-700 whitespace-nowrap text-center">
                                    <a href="{{ route('showFinishedMachines', $project->id) }}" class="text-yellow-400 hover:text-yellow-600 font-semibold transition">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                
            @endif
        </div>
    </div>
</x-app-layout>
