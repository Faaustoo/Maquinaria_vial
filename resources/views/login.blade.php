<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Transparente</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .custom-shadow {
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.2); 
        }
    </style>
</head>
<body class="bg-dark text-white">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card bg-transparent text-white custom-shadow p-4" style="width: 100%; max-width: 400px; border: none;">
            <h2 class="mb-4 text-center">Iniciar sesión</h2>

            <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Ingresar</button>

            @error('email')
                <div style="color: var(--bs-danger);">
                    {{ $message }}
                </div>
            @enderror
        </form>
        </div>
    </div>
</body>
</html>
