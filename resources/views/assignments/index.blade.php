<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('assignments.create') }}" 
               class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700">
                + Agregar 
            </a>
        </div>

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white">Maquinas en obras</h3>

            <table class="min-w-full mt-4 table-auto">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="py-2 px-4 border-b text-left text-white">Fecha inicio</th>
                        <th class="py-2 px-4 border-b text-left text-white">Fecha de fin</th>
                        <th class="py-2 px-4 border-b text-left text-white">Kilometros</th>
                        <th class="py-2 px-4 border-b text-left text-white">Máquina</th>
                        <th class="py-2 px-4 border-b text-left text-white">Obra</th>
                        <th class="py-2 px-4 border-b text-left text-white">Motivo</th>
                        <th class="py-2 px-4 border-b text-left text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($assignments as $assignment)
                    <tr class="text-white hover:bg-white hover:text-black">
                        <td class="py-2 px-4 border-b">{{ $assignment->start_date ?? 'Sin fecha' }}</td>
                        <td class="py-2 px-4 border-b">{{ $assignment->end_date ?? 'Sin fecha' }}</td>
                        <td class="py-2 px-4 border-b">{{ $assignment->kilometers ?? 'Sin datos' }}</td>
                        <td class="py-2 px-4 border-b">{{ $assignment->machine?->serial_number ?? 'Sin máquina asignada' }}</td>
                        <td class="py-2 px-4 border-b">{{ $assignment->projects?->name ?? 'Sin obra asignada' }}</td>
                        <td class="py-2 px-4 border-b">{{ $assignment->endReason?->description ?? 'Sin motivo' }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('assignments.edit', $assignment->id) }}" class="text-blue-800 hover:text-blue-500 mr-4">Editar</a>
                            <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-600 hover:text-red-900"
                                        onclick="abrirModal('¿Seguro querés eliminar este mantenimiento?', this.closest('form'))">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $assignments->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
