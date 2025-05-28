<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">

        <a href="{{ route('maintenances.index') }}"
           class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
             <i class="fas fa-arrow-circle-left mr-1"></i> Volver
        </a>
        
        @if (session('success'))
            <div id="success-message" class="bg-green-700 text-white p-4 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white mb-4">Recordatorios</h3>

            <table class="min-w-full table-auto border border-gray-700 rounded overflow-hidden">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Fecha</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Kilómetros</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Descripción</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Máquina</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Usuario</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-center text-white">Acciones</th> {{-- Nueva columna --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenances as $maintenance)
                        <tr class="hover:bg-gray-200 hover:text-black transition">
                            <td class="py-2 px-4 border-b border-gray-700">{{ \Carbon\Carbon::parse($maintenance->date)->format('d/m/Y') }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->kilometers }} km</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->description }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->machine->serial_number }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $maintenance->user->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700 whitespace-nowrap text-center">
                                <button type="button" class="text-red-500 hover:text-red-700 font-semibold transition"    onclick="abrir({{ $maintenance->id }})">
                                    <i class="fas fa-trash"></i>
                                </button>

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

  <div id="modalEliminar" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-gray-900 text-white p-6 rounded shadow-lg max-w-sm w-full">
                <h2 class="text-lg font-bold mb-4">Confirmar eliminación</h2>
                <p class="mb-6">¿Estás seguro que querés eliminar esta máquina?</p>
                <div class="flex justify-end gap-4">
                <button onclick="cerrar()" class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancelar</button>
                <form id="formEliminar" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 rounded hover:bg-red-700">Eliminar</button>
                </form>
                </div>
            </div>
            </div>


</x-app-layout>
