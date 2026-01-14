<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LC Design Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --lc-primary: #8B5CF6;
            --lc-secondary: #6366F1;
            --lc-dark: #0F0F1A;
            --lc-darker: #070710;
        }
        .bg-lc-primary { background-color: var(--lc-primary); }
        .bg-lc-secondary { background-color: var(--lc-secondary); }
        .bg-lc-dark { background-color: var(--lc-dark); }
        .bg-lc-darker { background-color: var(--lc-darker); }
        .from-lc-primary { --tw-gradient-from: var(--lc-primary); }
        .to-lc-secondary { --tw-gradient-to: var(--lc-secondary); }
        .from-lc-darker { --tw-gradient-from: var(--lc-darker); }
        .via-lc-dark { --tw-gradient-via: var(--lc-dark); }
        .focus\:border-lc-primary:focus { border-color: var(--lc-primary); }
        .focus\:ring-lc-primary:focus { --tw-ring-color: var(--lc-primary); }
        .focus\:ring-offset-lc-dark:focus { --tw-ring-offset-color: var(--lc-dark); }
    </style>
</head>
<body class="bg-gradient-to-br from-lc-darker via-lc-dark to-lc-darker min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div class="bg-white/5 backdrop-blur-xl rounded-2xl border border-white/10 p-8 shadow-2xl">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gradient-to-r from-lc-primary to-lc-secondary mb-4">
                    <i class="fas fa-lock text-white text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">Panel de Administración</h1>
                <p class="text-gray-400 mt-2">LC Design</p>
            </div>

            @if(session('error'))
            <div class="mb-4 p-3 bg-red-500/20 border border-red-500/50 rounded-lg text-red-400 text-sm">
                {{ session('error') }}
            </div>
            @endif

            <form method="POST" action="/admin-login">
                @csrf

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-key mr-2"></i>Contraseña de Administrador
                    </label>
                    <input id="password" type="password" name="password" required autofocus
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-lc-primary focus:ring-1 focus:ring-lc-primary transition"
                        placeholder="••••••••">
                </div>

                <button type="submit"
                    class="w-full py-3 px-4 bg-gradient-to-r from-lc-primary to-lc-secondary text-white font-semibold rounded-lg hover:opacity-90 transition transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-lc-primary focus:ring-offset-2 focus:ring-offset-lc-dark">
                    <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition text-sm">
                    <i class="fas fa-arrow-left mr-2"></i>Volver al sitio
                </a>
            </div>
        </div>

        <p class="text-center text-gray-500 text-sm mt-6">
            © {{ date('Y') }} LC Design. Todos los derechos reservados.
        </p>
    </div>
</body>
</html>
