<x-app-layout>
    <div class="py-4 max-w-3xl mx-auto sm:px-4 lg:px-6 text-white">
        <div class="bg-gray-800 p-4 rounded shadow">
            <div class="mb-3">
                <div class="flex justify-end mb-4">
                    <a href="{{ route('machines.index') }}" class="inline-block px-2 py-1 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                        <i class="fas fa-times text-xl"></i>
                    </a>
                </div>
            </div>
            <h2 class="text-xl font-bold mb-4 text-center">Detalles de la maquina</h2>

            <table class="min-w-full table-auto border border-gray-700 mb-6 text-sm">
                <tbody>
                    <tr class="border-b border-gray-700">
                        <td class="py-1.5 px-3 font-semibold">Numero de serie</td>
                        <td class="py-1.5 px-3">{{ $machine->serial_number }}</td>
                    </tr>
                    <tr class="border-b border-gray-700">
                        <td class="py-1.5 px-3 font-semibold">Modelo</td>
                        <td class="py-1.5 px-3">{{ $machine->model }}</td>
                    </tr>
                    <tr class="border-b border-gray-700">
                        <td class="py-1.5 px-3 font-semibold">Kilometros</td>
                        <td class="py-1.5 px-3">{{ $machine->kilometers }}</td>
                    </tr>
                    <tr class="border-b border-gray-700">
                        <td class="py-1.5 px-3 font-semibold">Tipo de maquina</td>
                        <td class="py-1.5 px-3">{{ $machine->machineType->name }}</td>
                    </tr>
                    <tr>
                        <td class="py-1.5 px-3 font-semibold">Estado de la maquina</td>
                        <td class="py-1.5 px-3">{{ $estado }}</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="text-lg font-semibold mb-2">Asignacion</h3>

            @if ($ActiveAssignment)
                <table class="min-w-full table-auto border border-gray-700 text-sm">
                    <thead class="bg-gray-700">
                        <tr>
                            <th class="py-1.5 px-3 text-left text-white">Usuario</th>
                            <th class="py-1.5 px-3 text-left text-white">Fecha de asignación</th>
                            <th class="py-1.5 px-3 text-left text-white">Provincia</th>
                            <th class="py-1.5 px-3 text-left text-white">Obra</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-700 hover:bg-gray-600 transition">
                            <td class="py-1.5 px-3">{{ $ActiveAssignment->user->name ?? 'Sin usuario' }}</td>
                            <td class="py-1.5 px-3">{{ $ActiveAssignment->created_at->format('d/m/Y') }}</td>
                            <td class="py-1.5 px-3">{{ $ActiveAssignment->project->province->name }}</td>
                            <td class="py-1.5 px-3">{{ $ActiveAssignment->project->name }}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p class="text-gray-300 text-sm">No hay asignaciones Activa.</p>
            @endif
        </div>
    </div>
</x-app-layout>
