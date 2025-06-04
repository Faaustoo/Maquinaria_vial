<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        ¿Olvidaste tu contraseña? No hay problema. Solo escribí tu dirección de correo y te enviaremos un enlace para que puedas restablecerla.
    </div>

  
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold">Correo electrónico</label>
            <input id="email" class="block mt-1 w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200" 
                   type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition-colors duration-200">
                Enviar enlace de restablecimiento
            </button>
        </div>

        <div class="flex items-center justify-end mt-6">
            <a href="{{ route('login') }}"  class="mt-1 text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-600 underline">
                    Volver al login
            </a>
        </div>
    </form>
</x-guest-layout>

