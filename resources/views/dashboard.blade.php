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
                    Visualizá todas las máquinas registradas, donde se muestra número de serie, modelo, tipo y kilómetros. Podés agregar nuevas máquinas, editar sus datos o eliminarlas.
                </li>
                <li>
                    <strong>Mantenimientos:</strong> 
                    Registrá mantenimientos realizados a las máquinas con fecha, descripción y kilómetros. Podés agregar o editar registros, ver el historial completo de mantenimientos por máquina y corregir errores en los datos ingresados.
                </li>
                <li>
                    <strong>Obras:</strong> 
                    Gestioná las obras activas y finalizadas. Podés agregar nuevas obras, editar datos, finalizar una obra y visualizar las máquinas que trabajaron en cada obra finalizada.
                </li>
                <li>
                    <strong>Asignaciones:</strong> 
                    Asigná máquinas disponibles a obras activas indicando el período de trabajo. Podés crear, editar y finalizar asignaciones. Además, se pueden consultar todas las asignaciones finalizadas con sus detalles completos.
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
