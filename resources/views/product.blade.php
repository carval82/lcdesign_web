@extends('layouts.public')

@section('title', $product->name . ' | LC Design')

@section('content')
    <section class="min-h-screen pt-32 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-8">
                <ol class="flex items-center space-x-2 text-sm text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Inicio</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li><a href="{{ route('home') }}#proyectos" class="hover:text-white transition">Proyectos</a></li>
                    <li><i class="fas fa-chevron-right text-xs"></i></li>
                    <li class="text-white">{{ $product->name }}</li>
                </ol>
            </nav>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Product Info -->
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 gradient-bg rounded-2xl flex items-center justify-center">
                            @if($product->type == 'app')
                            <i class="fas fa-mobile-alt text-2xl"></i>
                            @else
                            <i class="fas fa-laptop-code text-2xl"></i>
                            @endif
                        </div>
                        <div>
                            <span class="px-3 py-1 bg-green-500/20 text-green-400 text-xs font-medium rounded-full">
                                <i class="fas fa-circle text-[8px] mr-1"></i>{{ ucfirst($product->status) }}
                            </span>
                        </div>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ $product->name }}</h1>
                    
                    @if($product->acronym)
                    <p class="text-lc-primary text-lg mb-6">{{ $product->acronym }}</p>
                    @endif

                    <p class="text-gray-400 text-lg mb-8">{{ $product->description }}</p>

                    <!-- Tags -->
                    <div class="flex flex-wrap gap-3 mb-8">
                        @if($product->platform)
                        @foreach(explode(',', $product->platform) as $platform)
                        <span class="px-4 py-2 bg-white/10 rounded-full text-sm text-gray-300">
                            <i class="fas fa-desktop mr-2"></i>{{ ucfirst(trim($platform)) }}
                        </span>
                        @endforeach
                        @endif
                        @if($product->technology)
                        <span class="px-4 py-2 bg-lc-primary/20 rounded-full text-sm text-lc-primary">
                            <i class="fas fa-code mr-2"></i>{{ $product->technology }}
                        </span>
                        @endif
                    </div>

                    <!-- Features -->
                    @if($product->features)
                    <div class="glass-card rounded-2xl p-6 mb-8">
                        <h3 class="text-xl font-bold mb-4">Características</h3>
                        <ul class="grid md:grid-cols-2 gap-3">
                            @foreach($product->features as $feature)
                            <li class="flex items-center text-gray-300">
                                <i class="fas fa-check text-lc-primary mr-3"></i>{{ $feature }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-4">
                        @if($product->demo_url)
                        <a href="{{ $product->demo_url }}" target="_blank" class="gradient-bg px-8 py-4 rounded-full font-semibold hover:opacity-90 transition">
                            <i class="fas fa-play mr-2"></i>Ver Demo
                        </a>
                        @endif
                        @if($product->playstore_url)
                        <a href="{{ $product->playstore_url }}" target="_blank" class="glass-card px-8 py-4 rounded-full font-semibold hover:bg-white/10 transition">
                            <i class="fab fa-google-play mr-2"></i>Play Store
                        </a>
                        @endif
                        <a href="{{ route('home') }}#contacto" class="glass-card px-8 py-4 rounded-full font-semibold hover:bg-white/10 transition">
                            <i class="fas fa-envelope mr-2"></i>Solicitar Info
                        </a>
                    </div>
                </div>

                <!-- Product Image -->
                <div>
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border border-white/10">
                        <div class="bg-gray-800 px-4 py-3 flex items-center space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                            <span class="text-sm text-gray-400 ml-2">{{ $product->name }}</span>
                        </div>
                        @if($product->image)
                        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full">
                        @else
                        <div class="bg-gradient-to-br from-lc-primary/20 to-lc-secondary/20 h-96 flex items-center justify-center">
                            <div class="text-center">
                                <i class="fas fa-image text-8xl text-gray-600 mb-4"></i>
                                <p class="text-gray-500">Imagen próximamente</p>
                            </div>
                        </div>
                        @endif
                    </div>

                    @if($product->screenshots && count($product->screenshots) > 0)
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        @foreach($product->screenshots as $screenshot)
                        <div class="rounded-xl overflow-hidden border border-white/10">
                            <img src="{{ asset('images/' . $screenshot) }}" alt="Screenshot" class="w-full h-24 object-cover">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>

            @if($product->video_url)
            <div class="mt-16">
                <h2 class="text-2xl font-bold mb-6 text-center">
                    <i class="fab fa-youtube text-red-500 mr-2"></i>Video Demostrativo
                </h2>
                <div class="glass-card rounded-2xl p-4 max-w-4xl mx-auto">
                    <div class="relative pb-[56.25%] h-0 overflow-hidden rounded-xl">
                        @php
                            $videoId = '';
                            if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $product->video_url, $matches)) {
                                $videoId = $matches[1];
                            }
                        @endphp
                        @if($videoId)
                        <iframe 
                            class="absolute top-0 left-0 w-full h-full"
                            src="https://www.youtube.com/embed/{{ $videoId }}"
                            title="{{ $product->name }} - Video"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                        </iframe>
                        @else
                        <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800">
                            <p class="text-gray-400">Video no disponible</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
@endsection
