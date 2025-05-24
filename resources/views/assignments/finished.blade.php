<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
        <!-- Botón para volver -->
        <div class="mb-4">
            <a href="{{ route('assignments.index') }}" 
               class="inline-block px-4 py-2 bg-gray-600 text-white font-semibold rounded hover:bg-gray-700 transition">
                ← Volver a Asignaciones Activas
            </a>
        </div>

        <!-- Tabla de asignaciones finalizadas -->
        <div class="bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white mb-4">Obras Finalizadas</h3>

            <table class="min-w-full table-auto border border-gray-700 rounded overflow-hidden">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha inicio</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha fin</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Máquina</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Obra</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Km recorridos</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($assignments as $assignment)
                        <tr class="hover:bg-gray-200 hover:text-black transition">
                            <td class="py-2 px-4 border-b border-gray-700">{{ $assignment->start_date }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $assignment->end_date }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $assignment->machine->serial_number }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $assignment->project->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $assignment->kilometers }} km</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center text-white">No hay asignaciones finalizadas.</td>
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
