<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
        <!-- Acciones superiores -->
        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('assignments.create') }}"  class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition">  <i class="fas fa-square-plus"></i></a></a>
            <a href="{{ route('assignments.viewFinished') }}" class="inline-block px-4 py-2 bg-gray-600 text-white font-semibold rounded hover:bg-gray-700 transition"> <i class="fas fa-eye mr-2"></i>Finalizadas</a>
        </div>

        @if (session('success'))
            <div id="success-message" class="bg-green-700 text-white p-4 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white mb-4">Máquinas en obras</h3>

            <table class="min-w-full table-auto border border-gray-700 rounded overflow-hidden">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Obra</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Máquina</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha de inicio</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-center text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignments as $assignment)
                        <tr class="hover:bg-gray-200 hover:text-black transition">
                            <td class="py-2 px-4 border-b border-gray-700">{{ $assignment->project->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $assignment->machine->serial_number }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ \Carbon\Carbon::parse($assignment->start_date)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b border-gray-700 whitespace-nowrap text-center">
                                <a href="{{ route('assignments.edit', $assignment->id) }}"  class="text-blue-400 hover:text-blue-600 font-semibold mr-4 transition">   <i class="fas fa-edit"></i></a>
                                <a href="{{ route('assignments.finishForm', $assignment->id) }}"   class="text-green-400 hover:text-green-600 font-semibold transition">  <i class="fas fa-check"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-center text-white">No hay asignaciones registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            
            <div class="mt-4">
                {{ $assignments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
