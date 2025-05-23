<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('projects.create') }}"
               class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700">
                + Agregar nueva Obra
            </a>

            <a href="{{ route('projects.viewFinished') }}"
               class="inline-block px-4 py-2 bg-gray-600 text-white font-semibold rounded hover:bg-gray-700">
                Ver Obras Finalizadas
            </a>
        </div>

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white mb-4">Registro de obras activas</h3>

        
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="py-2 px-4 border-b text-left text-white">Nombre</th>
                        <th class="py-2 px-4 border-b text-left text-white">Fecha de inicio</th>
                        <th class="py-2 px-4 border-b text-left text-white">Provincia</th>
                        <th class="py-2 px-4 border-b text-left text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody id="results-body">
                    @foreach ($projects as $project)
                        <tr class="text-white hover:bg-white hover:text-black">
                            <td class="py-2 px-4 border-b text-left">{{ $project->name }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $project->start_date }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $project->province->name }}</td>
                            <td class="py-2 px-4 border-b text-left">
                                <a href="{{ route('projects.edit', $project->id) }}"class="text-blue-800 hover:text-blue-500 mr-4">Editar</a>
                                <a href="{{ route('projects.finalize', $project->id) }}"class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Finalizar Obra</a>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Paginación --}}
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
