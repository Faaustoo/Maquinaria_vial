<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('maintenances.create') }}" 
               class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700">
                + Agregar nuevo mantenimiento
            </a>
        </div>

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        

        <div class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white">Mantenimientos registrados</h3>

            <table class="min-w-full mt-4 table-auto">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="py-2 px-4 border-b text-left text-white">Fecha</th>
                        <th class="py-2 px-4 border-b text-left text-white">Kilómetros</th>
                        <th class="py-2 px-4 border-b text-left text-white">Descripción</th>
                        <th class="py-2 px-4 border-b text-left text-white">Máquina</th>
                        <th class="py-2 px-4 border-b text-left text-white">Usuario</th>
                        <th class="py-2 px-4 border-b text-left text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenances as $maintenance)
                        <tr class="text-white hover:bg-white hover:text-black">
                            <td class="py-2 px-4 border-b">{{ $maintenance->date }}</td>
                            <td class="py-2 px-4 border-b">{{ $maintenance->kilometers }} km</td>
                            <td class="py-2 px-4 border-b">{{ $maintenance->description }}</td>
                            <td class="py-2 px-4 border-b">{{ $maintenance->machine->serial_number }}</td>
                            <td class="py-2 px-4 border-b">{{ $maintenance->user->name }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('maintenances.edit', $maintenance->id) }}" class="text-blue-800 hover:text-blue-500 mr-4">Editar</a>
                                <a href="{{ route('maintenances.show', $maintenance->machine_id) }}" class="text-green-600 hover:text-green-800">Ver historial</a>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $maintenances->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
