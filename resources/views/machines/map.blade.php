
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold mb-4 text-white">Mapa de Máquinas Asignadas</h1>

        <div id="map" class="h-80 max-w-md rounded-lg overflow-hidden mx-auto"></div>

    </div>

    {{--CSS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    {{-- JS --}}
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        window.assignments = @json($assignments);
    </script>


@vite('resources/js/Machine/map.js')

</x-app-layout>
