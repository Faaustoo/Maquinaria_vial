<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
            Bienvenido al sistema de gestión de la constructora vial
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">
            <p class="mb-6 text-gray-700 dark:text-gray-300">
                Desde este panel podés acceder a los distintos módulos del sistema. A continuación te explicamos qué hace cada sección:
            </p>

            <ul class="space-y-4 text-gray-800 dark:text-gray-200">
                <li>
                    <strong>Máquinas:</strong> 
                    Visualizá todas las máquinas registradas. Podés agregar nuevas, editar sus datos o eliminarlas.
                </li>
                <li>
                    <strong>Mantenimientos:</strong> 
                    Registrá los mantenimientos realizados a las máquinas, con fecha, descripción y kilómetros. También podés ver el historial o modificar registros.
                </li>
                <li>
                    <strong>Obras:</strong> 
                    Gestioná las obras activas. Cada obra tiene su nombre, provincia y fechas de inicio y fin.
                </li>
                <li>
                    <strong>Asignaciones:</strong> 
                    Asigná máquinas a obras indicando el período en el que trabajarán. Podés finalizar asignaciones y consultar historial.
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>

