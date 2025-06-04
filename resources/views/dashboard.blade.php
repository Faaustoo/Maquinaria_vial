<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 text-right dark:text-gray-200">
            Bienvenido, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-6">

            <div class="mb-6">
                <h3 class="text-3xl font-bold text-indigo-600 dark:text-indigo-400">Sistema de gestión de la constructora vial</h3>
                <p class="mt-2 text-lg text-gray-700 dark:text-gray-300">
                    Desde aquí podés acceder a todos los módulos para administrar obras, máquinas, mantenimientos, asignaciones, ubicaciones y parámetros de configuración personal.
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3">
            
                <div class="p-6 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-800 transform hover:scale-105 transition duration-300 cursor-pointer">
                    <h4 class="font-semibold text-xl text-indigo-600 dark:text-indigo-400 mb-2 flex items-center">
                        <i class="fas fa-cogs mr-2"></i> Máquinas
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                        Creá, editá, eliminá y visualizá información de las máquinas, incluyendo su estado y kilómetros recorridos.
                    </p>
                </div>

              
                <div class="p-6 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-800 transform hover:scale-105 transition duration-300 cursor-pointer">
                    <h4 class="font-semibold text-xl text-indigo-600 dark:text-indigo-400 mb-2 flex items-center">
                        <i class="fas fa-tools mr-2"></i> Mantenimientos
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                        Registrá mantenimientos, consultá el historial por máquina y recibí recordatorios automáticos por email cuando se requieren mantenimientos.
                    </p>
                </div>

            
                <div class="p-6 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-800 transform hover:scale-105 transition duration-300 cursor-pointer">
                    <h4 class="font-semibold text-xl text-indigo-600 dark:text-indigo-400 mb-2 flex items-center">
                        <i class="fas fa-hard-hat mr-2"></i> Obras
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                        Creá y finalizá obras. Accedé al historial de obras terminadas con la lista de máquinas que trabajaron en cada una.
                    </p>
                </div>

                <div class="p-6 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-800 transform hover:scale-105 transition duration-300 cursor-pointer">
                    <h4 class="font-semibold text-xl text-indigo-600 dark:text-indigo-400 mb-2 flex items-center">
                        <i class="fas fa-tasks mr-2"></i> Asignaciones
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                        Asigná máquinas libres a obras activas, editá o finalizá asignaciones, y exportá asignaciones activas en PDF.
                    </p>
                </div>

                <div class="p-6 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-800 transform hover:scale-105 transition duration-300 cursor-pointer">
                    <h4 class="font-semibold text-xl text-indigo-600 dark:text-indigo-400 mb-2 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i> Ubicación
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                        Visualizá en un mapa dónde están ubicadas las máquinas en obras activas según su provincia.
                    </p>
                </div>

                <div class="p-6 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-100 dark:bg-gray-900 hover:bg-indigo-100 dark:hover:bg-indigo-800 transform hover:scale-105 transition duration-300 cursor-pointer">
                    <h4 class="font-semibold text-xl text-indigo-600 dark:text-indigo-400 mb-2 flex items-center">
                        <i class="fas fa-user-cog mr-2"></i> Configuración
                    </h4>
                    <p class="text-gray-700 dark:text-gray-300 text-sm">
                        Editá tu perfil, configurá los parámetros de mantenimiento de máquinas y cerrá sesión de forma segura.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
