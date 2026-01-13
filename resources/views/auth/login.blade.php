<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LC Design Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'lc-primary': '#8B5CF6',
                        'lc-secondary': '#6366F1',
                        'lc-dark': '#0F0F1A',
                        'lc-darker': '#070710',
                    }
                }
            }
        }
    </script>
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

            <x-auth-session-status class="mb-4 text-green-400" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-envelope mr-2"></i>Correo Electrónico
                    </label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-lc-primary focus:ring-1 focus:ring-lc-primary transition"
                        placeholder="tu@email.com">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        <i class="fas fa-key mr-2"></i>Contraseña
                    </label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:border-lc-primary focus:ring-1 focus:ring-lc-primary transition"
                        placeholder="••••••••">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
                </div>

                <div class="flex items-center justify-between mb-6">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-white/20 bg-white/5 text-lc-primary focus:ring-lc-primary">
                        <span class="ml-2 text-sm text-gray-400">Recordarme</span>
                    </label>
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
