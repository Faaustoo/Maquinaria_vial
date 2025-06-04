<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
    @csrf

        <div>
            <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold">Correo electrónico</label>
            <input id="email" class="block mt-1 w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password" class="block text-gray-700 dark:text-gray-300 font-semibold">Contraseña</label>
            <input id="password" class="block mt-1 w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <div class="mt-4 flex flex-col">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="mt-1 text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 underline">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>


        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition-colors duration-200 mt-6">
            Iniciar sesión
        </button>

        @if (Route::has('register'))
            <div class="flex justify-end mt-4">
                <a href="{{ route('register') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 underline">
                    Registrarse
                </a>
            </div>
        @endif
    </form>
</x-guest-layout>
