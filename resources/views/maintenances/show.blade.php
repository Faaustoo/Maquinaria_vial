<x-app-layout>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="mt-4">
            <a href="{{ route('maintenances.index') }}" class="inline-block mb-6 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition">
                <i class="fas fa-arrow-circle-left mr-1"></i> Volver 
            </a>
        </div>
        
        <h2 class="text-xl font-bold mb-4 text-white text-center">Historial de Mantenimientos  {{ $machine->name }}</h2>

        @if ($maintenances->isEmpty())
            <p class="text-white text-center">No hay mantenimientos registrados para esta máquina.</p>
        @else
            <table class="min-w-full bg-gray-800 text-white rounded shadow">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="px-4 py-2 text-left">Fecha</th>
                        <th class="px-4 py-2 text-left">Kilómetros</th>
                        <th class="px-4 py-2 text-left">Descripción</th>
                        <th class="px-4 py-2 text-left">Registrado por</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenances as $maintenance)
                        <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($maintenance->date)->format('d/m/Y') }}</td>
                            <td class="px-4 py-2">{{ $maintenance->kilometers }} km</td>
                            <td class="px-4 py-2">{{ $maintenance->description }}</td>
                            <td class="px-4 py-2">{{ $maintenance->user->name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
</x-app-layout>
