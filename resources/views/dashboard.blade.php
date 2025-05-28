<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 text-right dark:text-gray-200">
            Bienvenido, {{ Auth::user()->name }} 
        </h2>
    </x-slot>

    <div class="py-6 max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">

            <div class="mb-6">
                <h3 class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">Sistema de gestión de la constructora vial</h3>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">
                    Desde aquí podés acceder a todos los módulos para administrar obras, máquinas, mantenimientos y asignaciones.
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2">
                <div class="p-8 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 
                    hover:bg-indigo-100 dark:hover:bg-indigo-800 
                    transform hover:scale-110 transition-transform duration-300 cursor-pointer">
                    <h4 class="font-semibold text-2xl text-indigo-600 dark:text-indigo-400 mb-2">Máquinas</h4>
                    <p class="text-base text-gray-700 dark:text-gray-300">
                        Visualizá las máquinas registradas, agregá nuevas, editá o eliminá información, y controlá sus kilómetros.
                    </p>
                </div>

                <div class="p-8 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 
                    hover:bg-indigo-100 dark:hover:bg-indigo-800 
                    transform hover:scale-110 transition-transform duration-300 cursor-pointer">
                    <h4 class="font-semibold text-2xl text-indigo-600 dark:text-indigo-400 mb-2">Mantenimientos</h4>
                    <p class="text-base text-gray-700 dark:text-gray-300">
                        Registrá mantenimientos con fecha, descripción y kilómetros. Consultá el historial y corregí datos si es necesario.
                    </p>
                </div>

                <div class="p-8 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 
                    hover:bg-indigo-100 dark:hover:bg-indigo-800 
                    transform hover:scale-110 transition-transform duration-300 cursor-pointer">
                    <h4 class="font-semibold text-2xl text-indigo-600 dark:text-indigo-400 mb-2">Obras</h4>
                     <p class="text-base text-gray-700 dark:text-gray-300">
                         Creá nuevas obras, editá y finalizá las existentes. Además, podés ver las obras finalizadas junto con las máquinas que trabajaron en cada una.
                    </p>
                </div>

                <div class="p-8 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 
                    hover:bg-indigo-100 dark:hover:bg-indigo-800 
                    transform hover:scale-110 transition-transform duration-300 cursor-pointer">
                    <h4 class="font-semibold text-2xl text-indigo-600 dark:text-indigo-400 mb-2">Asignaciones</h4>
                    <p class="text-base text-gray-700 dark:text-gray-300">
                        Asigná máquinas a obras indicando el período de trabajo. Consultá todas las asignaciones activas o finalizadas.
                    </p>
                </div>
        </div>
    </div>


</x-app-layout>
