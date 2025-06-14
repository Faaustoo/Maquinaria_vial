<nav x-data="{ open: false }" class="bg-transparent ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-home mr-1"></i> {{ __('Inicio') }}
                    </x-nav-link>

                    <x-nav-link :href="route('machines.index')" :active="request()->routeIs('machines*')">
                        <i class="fas fa-cogs mr-1"></i> {{ __('Máquinas') }}
                    </x-nav-link>

                    <x-nav-link :href="route('maintenances.index')" :active="request()->routeIs('maintenances*')">
                        <i class="fas fa-tools mr-1"></i> {{ __('Mantenimiento') }}
                    </x-nav-link>

                    <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects*')">
                        <i class="fas fa-hard-hat mr-2"></i>{{ __('Obras') }}
                    </x-nav-link>

                    <x-nav-link :href="route('assignments.index')" :active="request()->routeIs('assignments*')">
                        <i class="fas fa-tasks mr-1"></i> {{ __('Asignaciones') }}
                    </x-nav-link>

                    <x-nav-link :href="route('machines.location')" :active="request()->routeIs('machines.location')">
                        <i class="fas fa-map-marker-alt mr-1"></i> {{ __('Ubicación') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-700 dark:text-gray-300 bg-transparent hover:text-indigo-600 dark:hover:text-indigo-400 focus:outline-none transition ease-in-out duration-150">
                            <i class="fas fa-user-cog fa-2x mr-2"></i>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">

                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                            <i class="fas fa-user mr-2"></i> {{ __('Perfil') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('parameters.edit')" class="flex items-center">
                            <i class="fas fa-cog mr-2"></i> {{ __('Parámetros') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="flex items-center"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>


                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>

                <x-responsive-nav-link :href="route('parameters.edit')">
                    {{ __('Parámetros') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>
