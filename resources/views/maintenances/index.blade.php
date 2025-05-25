<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">

        {{-- Botones superiores --}}
        <div class="mb-4 flex items-center justify-between flex-wrap gap-4">
            <a href="{{ route('maintenances.create') }}" 
               class="px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition">
                + Agregar nuevo mantenimiento
            </a>

            <form action="{{ route('maintenances.show', 0) }}" method="GET" 
                  onsubmit="this.action = '/maintenances/' + this.machine_id.value;" 
                  class="flex items-center gap-2">
                <label for="machine_id" class="text-white font-semibold">Máquina:</label>
                
                <select name="machine_id" id="machine_id" 
                        class="rounded p-2 bg-gray-900 text-white border border-gray-600">
                    @foreach ($machines as $machine)
                        <option value="{{ $machine->id }}">{{ $machine->serial_number }}</option>
                    @endforeach
                </select>

                <button type="submit" 
                        class="px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition">
                    Ver historial
                </button>
            </form>
        </div>

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div id="success-message" class="bg-green-700 text-white p-4 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tabla de mantenimientos --}}
        <div class="bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white mb-4">Mantenimientos registrados</h3>

            <table class="min-w-full table-auto border border-gray-700 rounded overflow-hidden">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Kilómetros</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Descripción</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Máquina</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Usuario</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenances as $maintenance)
                        <tr class="hover:bg-gray-200 hover:text-black transition">
                            <td class="py-2 px-4 border-b border-gray-700">{{ \Carbon\Carbon::parse($maintenance->date)->format('d/m/Y')  }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->kilometers }} km</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->description }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->machine->serial_number }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->user->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700 whitespace-nowrap">
                                <a href="{{ route('maintenances.edit', $maintenance->id) }}" 
                                   class="text-blue-400 hover:text-blue-600 font-semibold mr-4 transition">
                                   Editar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Paginación --}}
            <div class="mt-6">
                {{ $maintenances->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
