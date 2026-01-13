<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') | LC Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'lc-primary': '#6366f1',
                        'lc-secondary': '#8b5cf6',
                        'lc-dark': '#0f172a',
                        'lc-darker': '#020617',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-lc-darker text-white fixed h-full">
            <div class="p-6">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo-icon.png') }}" alt="LC Design" class="h-10">
                </a>
            </div>
            
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 hover:bg-white/10 transition {{ request()->routeIs('admin.dashboard') ? 'bg-lc-primary/20 border-r-4 border-lc-primary' : '' }}">
                    <i class="fas fa-tachometer-alt w-6"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.products.index') }}" class="flex items-center px-6 py-3 hover:bg-white/10 transition {{ request()->routeIs('admin.products.*') ? 'bg-lc-primary/20 border-r-4 border-lc-primary' : '' }}">
                    <i class="fas fa-box w-6"></i>
                    <span>Productos</span>
                </a>
                <a href="{{ route('admin.services.index') }}" class="flex items-center px-6 py-3 hover:bg-white/10 transition {{ request()->routeIs('admin.services.*') ? 'bg-lc-primary/20 border-r-4 border-lc-primary' : '' }}">
                    <i class="fas fa-cogs w-6"></i>
                    <span>Servicios</span>
                </a>
                
                <div class="border-t border-white/10 mt-6 pt-6">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center px-6 py-3 hover:bg-white/10 transition">
                        <i class="fas fa-external-link-alt w-6"></i>
                        <span>Ver Sitio</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="px-6 py-3">
                        @csrf
                        <button type="submit" class="flex items-center hover:text-red-400 transition w-full">
                            <i class="fas fa-sign-out-alt w-6"></i>
                            <span>Cerrar Sesión</span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64">
            <!-- Top Bar -->
            <header class="bg-white shadow-sm px-8 py-4 flex items-center justify-between">
                <h1 class="text-xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h1>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ auth()->user()->name ?? 'Admin' }}</span>
                    <div class="w-10 h-10 bg-lc-primary rounded-full flex items-center justify-center text-white">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="p-8">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    {{ session('error') }}
                </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
