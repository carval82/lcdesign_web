@extends('layouts.public')

@section('title', 'LC Design | Desarrollo de Software a Medida')

@section('content')
    <!-- Hero Section -->
    <section id="inicio" class="min-h-screen flex items-center justify-center relative pt-20">
        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-lc-primary/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-lc-secondary/20 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 rounded-full glass-card mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-sm text-gray-300">Disponibles para nuevos proyectos</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold mb-6 leading-tight">
                    Transformamos Ideas en<br>
                    <span class="gradient-text">Software Excepcional</span>
                </h1>
                
                <p class="text-lg sm:text-xl text-gray-400 max-w-3xl mx-auto mb-8">
                    Desarrollamos soluciones tecnológicas a medida que impulsan el crecimiento de tu negocio. 
                    Desde aplicaciones móviles hasta sistemas empresariales complejos.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mb-12">
                    <a href="#contacto" class="gradient-bg px-8 py-4 rounded-full font-semibold text-lg hover:opacity-90 transition pulse-glow">
                        <i class="fas fa-rocket mr-2"></i>Iniciar Proyecto
                    </a>
                    <a href="#proyectos" class="glass-card px-8 py-4 rounded-full font-semibold text-lg hover:bg-white/10 transition">
                        <i class="fas fa-eye mr-2"></i>Ver Proyectos
                    </a>
                </div>
                
                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 max-w-2xl mx-auto">
                    <div class="glass-card rounded-2xl p-6">
                        <div class="text-3xl font-bold gradient-text">{{ $products->count() }}</div>
                        <div class="text-gray-400 text-sm">Proyectos</div>
                    </div>
                    <div class="glass-card rounded-2xl p-6">
                        <div class="text-3xl font-bold gradient-text">{{ $apps->count() }}</div>
                        <div class="text-gray-400 text-sm">Apps Móviles</div>
                    </div>
                    <div class="glass-card rounded-2xl p-6">
                        <div class="text-3xl font-bold gradient-text">10+</div>
                        <div class="text-gray-400 text-sm">Tecnologías</div>
                    </div>
                    <div class="glass-card rounded-2xl p-6">
                        <div class="text-3xl font-bold gradient-text">1+</div>
                        <div class="text-gray-400 text-sm">Años</div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
            <a href="#servicios" class="flex flex-col items-center text-gray-400 hover:text-white transition">
                <span class="text-sm mb-2">Explorar</span>
                <i class="fas fa-chevron-down animate-bounce"></i>
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="py-24 relative">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 rounded-full glass-card text-sm text-lc-primary font-medium mb-4">
                    <i class="fas fa-cogs mr-2"></i>Nuestros Servicios
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                    Soluciones <span class="gradient-text">Tecnológicas</span>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Ofrecemos servicios integrales de desarrollo de software adaptados a las necesidades específicas de cada cliente.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                <div class="service-card glass-card rounded-3xl p-8">
                    <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                        <i class="{{ $service->icon ?? 'fas fa-code' }} text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">{{ $service->name }}</h3>
                    <p class="text-gray-400 mb-4">{{ $service->description }}</p>
                    @if($service->features)
                    <ul class="text-sm text-gray-500 space-y-2">
                        @foreach($service->features as $feature)
                        <li><i class="fas fa-check text-lc-primary mr-2"></i>{{ $feature }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="proyectos" class="py-24 relative bg-lc-dark/50">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 rounded-full glass-card text-sm text-lc-primary font-medium mb-4">
                    <i class="fas fa-briefcase mr-2"></i>Nuestros Proyectos
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                    Proyectos <span class="gradient-text">Destacados</span>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Conoce algunos de nuestros proyectos más exitosos y las soluciones que hemos desarrollado.
                </p>
            </div>
            
            <div class="space-y-16">
                @foreach($products as $index => $product)
                <div class="grid lg:grid-cols-2 gap-8 items-center">
                    <div class="service-card glass-card rounded-3xl p-8 relative overflow-hidden {{ $index % 2 == 0 ? 'order-2 lg:order-1' : 'order-2' }}">
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-medium rounded-full">
                                <i class="fas fa-circle text-[8px] mr-1"></i>{{ ucfirst($product->status) }}
                            </span>
                        </div>
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center mb-6">
                            @if($product->type == 'app')
                            <i class="fas fa-mobile-alt text-2xl"></i>
                            @else
                            <i class="fas fa-laptop-code text-2xl"></i>
                            @endif
                        </div>
                        <h3 class="text-2xl font-bold mb-2">{{ $product->name }}</h3>
                        @if($product->acronym)
                        <p class="text-lc-primary text-sm mb-3">{{ $product->acronym }}</p>
                        @endif
                        <p class="text-gray-400 mb-4">{{ $product->description }}</p>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            @if($product->platform)
                            @foreach(explode(',', $product->platform) as $platform)
                            <span class="px-3 py-1 bg-white/10 rounded-full text-xs text-gray-300">{{ ucfirst(trim($platform)) }}</span>
                            @endforeach
                            @endif
                            @if($product->technology)
                            <span class="px-3 py-1 bg-lc-primary/20 rounded-full text-xs text-lc-primary">{{ $product->technology }}</span>
                            @endif
                        </div>
                        
                        @if($product->features)
                        <ul class="text-sm text-gray-500 space-y-2">
                            @foreach(array_slice($product->features, 0, 4) as $feature)
                            <li><i class="fas fa-check text-lc-primary mr-2"></i>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        @endif
                        
                        <div class="mt-6 flex flex-wrap gap-4">
                            <a href="{{ route('product.show', $product->slug) }}" class="text-lc-primary hover:text-lc-secondary transition">
                                Ver más detalles <i class="fas fa-arrow-right ml-1"></i>
                            </a>
                            @if($product->video_url)
                            @php
                                $videoId = '';
                                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $product->video_url, $matches)) {
                                    $videoId = $matches[1];
                                }
                            @endphp
                            @if($videoId)
                            <button onclick="openVideoModal('{{ $videoId }}', '{{ $product->name }}')" class="text-red-500 hover:text-red-400 transition">
                                <i class="fab fa-youtube mr-1"></i>Ver Video
                            </button>
                            @endif
                            @endif
                        </div>
                    </div>
                    <div class="{{ $index % 2 == 0 ? 'order-1 lg:order-2' : 'order-1' }}">
                        @if($product->type == 'app')
                        <div class="flex flex-col items-center">
                            <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-white/10 max-w-xs">
                                <div class="bg-gray-800 px-4 py-2 flex items-center space-x-2">
                                    <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                    <span class="text-xs text-gray-400 ml-2">{{ $product->name }}</span>
                                </div>
                                @if($product->image)
                                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full max-h-96 object-contain">
                                @else
                                <div class="bg-gradient-to-br from-lc-primary/20 to-lc-secondary/20 h-64 flex items-center justify-center">
                                    <i class="fas fa-image text-6xl text-gray-600"></i>
                                </div>
                                @endif
                            </div>
                            @if($product->screenshots && count($product->screenshots) > 0)
                            <div class="mt-4 grid grid-cols-4 gap-2 max-w-xs">
                                @foreach(array_slice($product->screenshots, 0, 8) as $screenshot)
                                <div class="rounded-lg overflow-hidden border border-white/10 hover:border-lc-primary/50 transition cursor-pointer" onclick="openLightbox('{{ asset('images/' . $screenshot) }}')">
                                    <img src="{{ asset('images/' . $screenshot) }}" alt="Screenshot" class="w-full h-12 object-cover hover:scale-110 transition">
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        @else
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-white/10">
                            <div class="bg-gray-800 px-4 py-2 flex items-center space-x-2">
                                <div class="w-3 h-3 rounded-full bg-red-500"></div>
                                <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                                <div class="w-3 h-3 rounded-full bg-green-500"></div>
                                <span class="text-xs text-gray-400 ml-2">{{ $product->name }}</span>
                            </div>
                            @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full">
                            @else
                            <div class="bg-gradient-to-br from-lc-primary/20 to-lc-secondary/20 h-64 flex items-center justify-center">
                                <i class="fas fa-image text-6xl text-gray-600"></i>
                            </div>
                            @endif
                        </div>
                        @if($product->screenshots && count($product->screenshots) > 0)
                        <div class="mt-4 grid grid-cols-5 md:grid-cols-10 gap-2">
                            @foreach(array_slice($product->screenshots, 0, 10) as $screenshot)
                            <div class="rounded-lg overflow-hidden border border-white/10 hover:border-lc-primary/50 transition cursor-pointer" onclick="openLightbox('{{ asset('images/' . $screenshot) }}')">
                                <img src="{{ asset('images/' . $screenshot) }}" alt="Screenshot" class="w-full h-16 object-cover hover:scale-110 transition">
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Technologies Section -->
    <section id="tecnologias" class="py-24 relative">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 rounded-full glass-card text-sm text-lc-primary font-medium mb-4">
                    <i class="fas fa-microchip mr-2"></i>Stack Tecnológico
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                    Tecnologías que <span class="gradient-text">Dominamos</span>
                </h2>
            </div>
            
            <div class="grid grid-cols-3 md:grid-cols-6 gap-8">
                @php
                $technologies = [
                    ['name' => 'Laravel', 'icon' => 'fab fa-laravel', 'color' => 'text-red-500'],
                    ['name' => 'React', 'icon' => 'fab fa-react', 'color' => 'text-cyan-400'],
                    ['name' => 'Kotlin', 'icon' => 'fab fa-android', 'color' => 'text-green-500'],
                    ['name' => 'PHP', 'icon' => 'fab fa-php', 'color' => 'text-indigo-400'],
                    ['name' => 'JavaScript', 'icon' => 'fab fa-js-square', 'color' => 'text-yellow-400'],
                    ['name' => 'MySQL', 'icon' => 'fas fa-database', 'color' => 'text-blue-500'],
                    ['name' => 'Node.js', 'icon' => 'fab fa-node-js', 'color' => 'text-green-400'],
                    ['name' => 'Python', 'icon' => 'fab fa-python', 'color' => 'text-yellow-300'],
                    ['name' => 'Git', 'icon' => 'fab fa-git-alt', 'color' => 'text-orange-500'],
                    ['name' => 'Docker', 'icon' => 'fab fa-docker', 'color' => 'text-blue-400'],
                    ['name' => 'HTML5', 'icon' => 'fab fa-html5', 'color' => 'text-orange-600'],
                    ['name' => 'CSS3', 'icon' => 'fab fa-css3-alt', 'color' => 'text-blue-600'],
                ];
                @endphp
                
                @foreach($technologies as $tech)
                <div class="tech-icon glass-card rounded-2xl p-6 text-center">
                    <i class="{{ $tech['icon'] }} text-4xl {{ $tech['color'] }} mb-3"></i>
                    <p class="text-sm text-gray-400">{{ $tech['name'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="nosotros" class="py-24 relative bg-lc-dark/50">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span class="inline-block px-4 py-2 rounded-full glass-card text-sm text-lc-primary font-medium mb-4">
                        <i class="fas fa-users mr-2"></i>Sobre Nosotros
                    </span>
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6">
                        Somos <span class="gradient-text">LC Design</span>
                    </h2>
                    <p class="text-gray-400 mb-6">
                        Somos una empresa de desarrollo de software comprometida con la innovación y la excelencia. 
                        Nuestro equipo combina creatividad y experiencia técnica para crear soluciones que realmente 
                        marcan la diferencia en tu negocio.
                    </p>
                    <p class="text-gray-400 mb-8">
                        Desde aplicaciones móviles hasta sistemas empresariales complejos, trabajamos de la mano 
                        con nuestros clientes para entender sus necesidades y superar sus expectativas.
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center">
                                <i class="fas fa-check"></i>
                            </div>
                            <span class="text-gray-300">Código Limpio</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center">
                                <i class="fas fa-clock"></i>
                            </div>
                            <span class="text-gray-300">Entregas a Tiempo</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center">
                                <i class="fas fa-headset"></i>
                            </div>
                            <span class="text-gray-300">Soporte 24/7</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <span class="text-gray-300">Seguridad</span>
                        </div>
                    </div>
                </div>
                
                <div class="glass-card rounded-3xl p-8">
                    <div class="text-center mb-8">
                        <img src="{{ asset('images/logo 2.png') }}" alt="LC Design" class="h-32 mx-auto mb-4">
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                            <span class="text-gray-400">Proyectos Activos</span>
                            <span class="font-bold text-lc-primary">{{ $products->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                            <span class="text-gray-400">Apps Móviles</span>
                            <span class="font-bold text-lc-primary">{{ $apps->count() }}</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                            <span class="text-gray-400">Tecnologías</span>
                            <span class="font-bold text-lc-primary">10+</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl">
                            <span class="text-gray-400">Años de Experiencia</span>
                            <span class="font-bold text-lc-primary">1+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-24 relative">
        <div class="max-w-screen-xl mx-auto px-6 lg:px-12">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-2 rounded-full glass-card text-sm text-lc-primary font-medium mb-4">
                    <i class="fas fa-envelope mr-2"></i>Contacto
                </span>
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-4">
                    ¿Listo para <span class="gradient-text">Empezar</span>?
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Cuéntanos sobre tu proyecto y te ayudaremos a hacerlo realidad.
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="glass-card rounded-3xl p-8">
                    @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500/20 border border-green-500/50 rounded-xl text-green-400">
                        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Nombre</label>
                                <input type="text" name="nombre" required
                                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-lc-primary transition"
                                    placeholder="Tu nombre">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-lc-primary transition"
                                    placeholder="tu@email.com">
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Teléfono</label>
                            <input type="tel" name="telefono"
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-lc-primary transition"
                                placeholder="+57 301 248 1020">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-2">Mensaje</label>
                            <textarea name="mensaje" rows="4" required
                                class="w-full px-4 py-3 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-lc-primary transition resize-none"
                                placeholder="Cuéntanos sobre tu proyecto..."></textarea>
                        </div>
                        
                        <button type="submit"
                            class="w-full gradient-bg py-4 rounded-xl font-semibold text-lg hover:opacity-90 transition">
                            <i class="fas fa-paper-plane mr-2"></i>Enviar Mensaje
                        </button>
                    </form>
                </div>
                
                <!-- Contact Info -->
                <div class="space-y-8">
                    <div class="glass-card rounded-3xl p-8">
                        <h3 class="text-xl font-bold mb-6">Información de Contacto</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Ubicación</h4>
                                    <p class="text-gray-400">Chigorodó, Antioquia, Colombia</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Email</h4>
                                    <p class="text-gray-400">pcapacho24@gmail.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 gradient-bg rounded-xl flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Teléfono</h4>
                                    <p class="text-gray-400">+57 301 248 1020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="glass-card rounded-3xl p-8">
                        <h3 class="text-xl font-bold mb-4">Horario de Atención</h3>
                        <div class="space-y-2 text-gray-400">
                            <div class="flex justify-between">
                                <span>Lunes - Viernes</span>
                                <span>8:00 AM - 6:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Sábado</span>
                                <span>9:00 AM - 1:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Domingo</span>
                                <span>Cerrado</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 backdrop-blur-sm" onclick="closeLightbox()">
        <button class="absolute top-6 right-6 text-white text-4xl hover:text-lc-primary transition" onclick="closeLightbox()">
            <i class="fas fa-times"></i>
        </button>
        <img id="lightbox-img" src="" alt="Screenshot" class="max-w-[90vw] max-h-[90vh] rounded-lg shadow-2xl" onclick="event.stopPropagation()">
    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/95 backdrop-blur-sm" onclick="closeVideoModal()">
        <button class="absolute top-6 right-6 text-white text-4xl hover:text-red-500 transition z-10" onclick="closeVideoModal()">
            <i class="fas fa-times"></i>
        </button>
        <div class="w-full max-w-5xl mx-4" onclick="event.stopPropagation()">
            <div class="glass-card rounded-2xl p-2">
                <div id="videoTitle" class="text-center text-white font-semibold mb-2 px-4"></div>
                <div class="relative pb-[56.25%] h-0 overflow-hidden rounded-xl">
                    <iframe id="videoFrame" class="absolute top-0 left-0 w-full h-full" src="" title="Video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openLightbox(src) {
        const lightbox = document.getElementById('lightbox');
        const img = document.getElementById('lightbox-img');
        img.src = src;
        lightbox.classList.remove('hidden');
        lightbox.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        const lightbox = document.getElementById('lightbox');
        lightbox.classList.add('hidden');
        lightbox.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeLightbox();
            closeVideoModal();
        }
    });

    function openVideoModal(videoId, title) {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');
        const titleEl = document.getElementById('videoTitle');
        frame.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
        titleEl.textContent = title;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeVideoModal() {
        const modal = document.getElementById('videoModal');
        const frame = document.getElementById('videoFrame');
        frame.src = '';
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = 'auto';
    }
</script>
@endpush
