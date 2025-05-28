<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('projects.create') }}"
               class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition">
                <i class="fas fa-square-plus"></i>
            </a>

            <a href="{{ route('projects.viewFinished') }}"
               class="inline-block px-4 py-2 bg-gray-600 text-white font-semibold rounded hover:bg-gray-700 transition">
               <i class="fas fa-eye mr-2"></i>Finalizadas
            </a>
        </div>

        @if (session('success'))
            <div id="success-message" class="bg-green-700 text-white p-4 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white mb-4">Registro de obras activas</h3>

            <table class="min-w-full table-auto border border-gray-700 rounded overflow-hidden">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Nombre</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha de inicio</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Provincia</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-center text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr class="hover:bg-gray-200 hover:text-black transition">
                            <td class="py-2 px-4 border-b border-gray-700">{{ $project->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{\Carbon\Carbon::parse($project->start_date)->format('d/m/Y')  }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $project->province->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700 whitespace-nowrap text-center">
                                <a href="{{ route('projects.edit', $project->id) }}" 
                                class="text-blue-400 hover:text-blue-600 font-semibold mr-4 transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('projects.finalize', $project->id) }}"
                                class=" text-green-500 hover:text-green-700  font-semibold mr-4 transition">
                                    <i class="fas fa-check"></i>

                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
