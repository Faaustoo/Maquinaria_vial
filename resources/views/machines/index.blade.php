<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('machines.create') }}"
               class="inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded hover:bg-green-700">
                + Agregar nueva máquina
            </a>
        </div>

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-yellow dark:bg-gray-800 p-6 rounded shadow">
            <h3 class="text-lg font-semibold text-center text-white">Máquinas registradas</h3>

            <table class="min-w-full mt-4 table-auto">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        <th class="py-2 px-4 border-b text-left text-white">Número de serie</th>
                        <th class="py-2 px-4 border-b text-left text-white">Modelo</th>
                        <th class="py-2 px-4 border-b text-left text-white">Tipo de Máquina</th>
                        <th class="py-2 px-4 border-b text-left text-white">Kilometros</th>
                        <th class="py-2 px-4 border-b text-left text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody id="results-body">
                    @foreach ($machines as $machine)
                        <tr class="text-white hover:bg-white hover:text-black">
                            <td class="py-2 px-4 border-b text-left">{{ $machine->serial_number }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $machine->model }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $machine->MachineType->name }}</td>
                            <td class="py-2 px-4 border-b text-left">{{ $machine->kilometers }}</td>
                            <td class="py-2 px-4 border-b text-left">
                                <a href="{{ route('machines.edit', $machine->id) }}" class="text-blue-800 hover:text-blue-500 mr-4">Editar</a>
                                <form action="{{ route('machines.destroy', $machine->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="text-red-600 hover:text-red-900"
                                        onclick="abrirModal('¿Seguro querés eliminar esta máquina?', this.closest('form'))">
                                        Eliminar
                                    </button>
                                </form>
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


</x-app-layout>
