@extends('layouts.admin')

@section('title', 'Nuevo Servicio')
@section('header', 'Nuevo Servicio')

@section('content')
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Crear Servicio</h2>
        </div>
        
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nombre *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Icono (FontAwesome)</label>
                    <input type="text" name="icon" value="{{ old('icon', 'fas fa-cog') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        placeholder="fas fa-code">
                    <p class="text-xs text-gray-500 mt-1">Ej: fas fa-code, fas fa-mobile-alt, fas fa-server</p>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Descripción *</label>
                <textarea name="description" rows="4" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Características (una por línea)</label>
                <textarea name="features" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    placeholder="Característica 1&#10;Característica 2&#10;Característica 3">{{ old('features') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Imagen</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500">
            </div>

            <div class="mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="active" value="1" checked class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-700">Servicio Activo</span>
                </label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.services.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                    Cancelar
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Crear Servicio
                </button>
            </div>
        </form>
    </div>
@endsection
