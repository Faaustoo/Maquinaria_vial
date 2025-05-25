<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white">
        <div class="mb-4">
            <a href="{{ route('machines.create') }}"
               class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700 transition">
                + Agregar nueva máquina
            </a>
        </div>

        @if (session('success'))
            <div id="success-message" class="bg-green-700 text-white p-4 rounded mb-4 shadow">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white mb-4">Máquinas registradas</h3>

            <table class="min-w-full table-auto border border-gray-700 rounded overflow-hidden">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Número de serie</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Modelo</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Tipo de Máquina</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Kilómetros</th>
                        <th class="py-2 px-4 border-b border-gray-600 text-left text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody id="results-body">
                    @foreach ($machines as $machine)
                        <tr class="hover:bg-gray-200 hover:text-black transition">
                            <td class="py-2 px-4 border-b border-gray-700">{{ $machine->serial_number }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $machine->model }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $machine->machineType->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $machine->kilometers }}</td>
                            <td class="py-2 px-4 border-b border-gray-700 whitespace-nowrap">
                                <a href="{{ route('machines.edit', $machine->id) }}" 
                                   class="text-blue-400 hover:text-blue-600 font-semibold mr-4 transition">
                                    Editar
                                </a>
                            <button type="button" class="text-red-500 hover:text-red-700 font-semibold transition"
                                    onclick="abrirModal({{ $machine->id }})">Eliminar
                            </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Paginación --}}
            <div class="mt-4">
                {{ $machines->links() }}
            </div>
        </div>
    </div>


            <div id="modalEliminar" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-gray-900 text-white p-6 rounded shadow-lg max-w-sm w-full">
                <h2 class="text-lg font-bold mb-4">Confirmar eliminación</h2>
                <p class="mb-6">¿Estás seguro que querés eliminar esta máquina?</p>
                <div class="flex justify-end gap-4">
                <button onclick="cerrarModal()" class="px-4 py-2 bg-gray-700 rounded hover:bg-gray-600">Cancelar</button>
                <form id="formEliminar" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 rounded hover:bg-red-700">Eliminar</button>
                </form>
                </div>
            </div>
            </div>

</x-app-layout>
