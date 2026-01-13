<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LC Design - Desarrollo de Software a Medida. Soluciones tecnológicas innovadoras para tu negocio.">
    <meta name="keywords" content="desarrollo software, aplicaciones móviles, desarrollo web, tecnología, programación">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LC Design | Desarrollo de Software a Medida')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo-icon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo-icon.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
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
    <style>
        * { font-family: 'Inter', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .gradient-bg { background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%); }
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .tech-icon { transition: all 0.3s ease; }
        .tech-icon:hover {
            transform: translateY(-5px);
            filter: drop-shadow(0 10px 20px rgba(99, 102, 241, 0.3));
        }
        .floating { animation: floating 3s ease-in-out infinite; }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(99, 102, 241, 0.3); }
            50% { box-shadow: 0 0 40px rgba(99, 102, 241, 0.6); }
        }
        html { scroll-behavior: smooth; }
        .nav-link { position: relative; }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after { width: 100%; }
        .service-card { transition: all 0.3s ease; }
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px -12px rgba(99, 102, 241, 0.25);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-lc-darker text-white overflow-x-hidden">
    
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-lc-darker/80 backdrop-blur-lg border-b border-white/10">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/logo-icon.png') }}" alt="LC Design" class="h-14">
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}#inicio" class="nav-link text-gray-300 hover:text-white transition">Inicio</a>
                    <a href="{{ route('home') }}#servicios" class="nav-link text-gray-300 hover:text-white transition">Servicios</a>
                    <a href="{{ route('home') }}#proyectos" class="nav-link text-gray-300 hover:text-white transition">Proyectos</a>
                    <a href="{{ route('home') }}#tecnologias" class="nav-link text-gray-300 hover:text-white transition">Tecnologías</a>
                    <a href="{{ route('home') }}#nosotros" class="nav-link text-gray-300 hover:text-white transition">Nosotros</a>
                    <a href="{{ route('home') }}#contacto" class="gradient-bg px-6 py-2 rounded-full font-medium hover:opacity-90 transition">Contacto</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-white">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('home') }}#inicio" class="block text-gray-300 hover:text-white transition py-2">Inicio</a>
                <a href="{{ route('home') }}#servicios" class="block text-gray-300 hover:text-white transition py-2">Servicios</a>
                <a href="{{ route('home') }}#proyectos" class="block text-gray-300 hover:text-white transition py-2">Proyectos</a>
                <a href="{{ route('home') }}#tecnologias" class="block text-gray-300 hover:text-white transition py-2">Tecnologías</a>
                <a href="{{ route('home') }}#nosotros" class="block text-gray-300 hover:text-white transition py-2">Nosotros</a>
                <a href="{{ route('home') }}#contacto" class="block gradient-bg px-6 py-2 rounded-full font-medium text-center">Contacto</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-lc-darker border-t border-white/10 py-12">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div class="col-span-2">
                    <div class="mb-4">
                        <img src="{{ asset('images/logo-icon.png') }}" alt="LC Design" class="h-16">
                    </div>
                    <p class="text-gray-400 mb-4">
                        Transformamos ideas en soluciones tecnológicas innovadoras. Tu éxito es nuestra misión.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full glass-card flex items-center justify-center hover:bg-lc-primary/20 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full glass-card flex items-center justify-center hover:bg-lc-primary/20 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full glass-card flex items-center justify-center hover:bg-lc-primary/20 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full glass-card flex items-center justify-center hover:bg-lc-primary/20 transition">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Enlaces</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('home') }}#inicio" class="hover:text-white transition">Inicio</a></li>
                        <li><a href="{{ route('home') }}#servicios" class="hover:text-white transition">Servicios</a></li>
                        <li><a href="{{ route('home') }}#proyectos" class="hover:text-white transition">Proyectos</a></li>
                        <li><a href="{{ route('home') }}#contacto" class="hover:text-white transition">Contacto</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Servicios</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('home') }}#servicios" class="hover:text-white transition">Desarrollo Web</a></li>
                        <li><a href="{{ route('home') }}#servicios" class="hover:text-white transition">Apps Móviles</a></li>
                        <li><a href="{{ route('home') }}#servicios" class="hover:text-white transition">Software a Medida</a></li>
                        <li><a href="{{ route('home') }}#servicios" class="hover:text-white transition">Facturación Electrónica</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} LC Design. Todos los derechos reservados.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition">Política de Privacidad</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition">Términos de Servicio</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/573012481020?text=Hola%20LC%20Design,%20me%20interesa%20conocer%20más%20sobre%20sus%20servicios" 
       target="_blank" 
       class="fixed bottom-6 right-6 z-50 w-16 h-16 bg-green-500 rounded-full flex items-center justify-center shadow-lg hover:bg-green-600 hover:scale-110 transition-all duration-300 group">
        <i class="fab fa-whatsapp text-white text-3xl"></i>
        <span class="absolute right-20 bg-white text-gray-800 px-4 py-2 rounded-lg shadow-lg text-sm font-medium opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
            ¡Escríbenos!
        </span>
    </a>

    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuBtn && mobileMenu) {
            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
            
            // Close mobile menu when clicking a link
            document.querySelectorAll('#mobile-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        }
        
        // Navbar background on scroll
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('bg-lc-darker/95');
            } else {
                nav.classList.remove('bg-lc-darker/95');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
