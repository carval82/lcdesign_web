@extends('layouts.admin')

@section('title', 'Productos')
@section('header', 'Productos')

@section('content')
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b flex items-center justify-between">
            <h2 class="text-lg font-semibold text-gray-800">Lista de Productos</h2>
            <a href="{{ route('admin.products.create') }}" class="bg-lc-primary text-white px-4 py-2 rounded-lg hover:bg-lc-secondary transition">
                <i class="fas fa-plus mr-2"></i>Nuevo Producto
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase w-16">Orden</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 text-center">
                            <span class="inline-flex items-center justify-center w-8 h-8 bg-lc-primary/10 text-lc-primary font-bold rounded-full">
                                {{ $product->order }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-lc-primary/10 rounded-lg flex items-center justify-center mr-3">
                                    @if($product->type == 'app')
                                    <i class="fas fa-mobile-alt text-lc-primary"></i>
                                    @else
                                    <i class="fas fa-laptop-code text-lc-primary"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($product->short_description, 50) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-600">
                                {{ ucfirst($product->type) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 text-xs rounded-full {{ $product->status == 'active' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('product.show', $product->slug) }}" target="_blank" class="text-gray-400 hover:text-blue-500 mr-3">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-gray-400 hover:text-lc-primary mr-3">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                            No hay productos registrados
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
