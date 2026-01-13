@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Productos</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['products'] }}</p>
                </div>
                <div class="w-12 h-12 bg-lc-primary/10 rounded-xl flex items-center justify-center">
                    <i class="fas fa-box text-lc-primary text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Servicios</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['services'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-cogs text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Visitas Hoy</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['visits_today'] }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-eye text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Visitas Totales</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $stats['visits_total'] }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-8">
        <!-- Products List -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-800">Productos</h2>
                <a href="{{ route('admin.products.create') }}" class="bg-lc-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-lc-secondary transition">
                    <i class="fas fa-plus mr-2"></i>Nuevo
                </a>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @forelse($products as $product)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-lc-primary/10 rounded-lg flex items-center justify-center">
                                @if($product->type == 'app')
                                <i class="fas fa-mobile-alt text-lc-primary"></i>
                                @else
                                <i class="fas fa-laptop-code text-lc-primary"></i>
                                @endif
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $product->name }}</p>
                                <p class="text-sm text-gray-500">{{ $product->technology }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="px-2 py-1 text-xs rounded-full {{ $product->status == 'active' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-gray-400 hover:text-lc-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center py-4">No hay productos registrados</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Recent Visits -->
        <div class="bg-white rounded-xl shadow-sm">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Visitas Recientes</h2>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    @forelse($recent_visits as $visit)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-4">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-globe text-blue-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $visit->page ?? 'Página' }}</p>
                                <p class="text-sm text-gray-500">{{ $visit->ip_address }}</p>
                            </div>
                        </div>
                        <span class="text-sm text-gray-400">{{ $visit->created_at->diffForHumans() }}</span>
                    </div>
                    @empty
                    <p class="text-gray-500 text-center py-4">No hay visitas registradas</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
