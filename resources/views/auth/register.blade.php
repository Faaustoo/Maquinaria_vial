<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold">Nombre completo</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                class="block mt-1 w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold">Correo electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                class="block mt-1 w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <div class="mt-4">
            <label for="password" class="block text-gray-700 dark:text-gray-300 font-semibold">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                class="block mt-1 w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300 font-semibold">Confirmar contraseña</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                class="block mt-1 w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition-colors duration-200 mt-6">
                Registrarse
            </button>
        </div>
        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 underline">
                ¿Ya tienes una cuenta?
            </a>
        </div>
    </form>
</x-guest-layout>
