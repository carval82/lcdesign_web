@extends('layouts.admin')

@section('title', 'Nuevo Producto')
@section('header', 'Nuevo Producto')

@section('content')
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Crear Producto</h2>
        </div>
        
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nombre *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">
                    @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Acrónimo</label>
                    <input type="text" name="acronym" value="{{ old('acronym') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary"
                        placeholder="Ej: Aplicación Nacional de Ventas...">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Descripción Corta</label>
                <input type="text" name="short_description" value="{{ old('short_description') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Descripción Completa *</label>
                <textarea name="description" rows="4" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid md:grid-cols-3 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tipo *</label>
                    <select name="type" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">
                        <option value="app" {{ old('type') == 'app' ? 'selected' : '' }}>App Móvil</option>
                        <option value="software" {{ old('type') == 'software' ? 'selected' : '' }}>Software</option>
                        <option value="web" {{ old('type') == 'web' ? 'selected' : '' }}>Web</option>
                    </select>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Plataforma</label>
                    <input type="text" name="platform" value="{{ old('platform') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary"
                        placeholder="android, web, desktop">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tecnología</label>
                    <input type="text" name="technology" value="{{ old('technology') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary"
                        placeholder="React + SQLite">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Estado *</label>
                    <select name="status" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Activo</option>
                        <option value="development" {{ old('status') == 'development' ? 'selected' : '' }}>En Desarrollo</option>
                        <option value="coming_soon" {{ old('status') == 'coming_soon' ? 'selected' : '' }}>Próximamente</option>
                    </select>
                </div>
                
                <div class="flex items-center pt-8">
                    <input type="checkbox" name="featured" id="featured" class="w-4 h-4 text-lc-primary" {{ old('featured') ? 'checked' : '' }}>
                    <label for="featured" class="ml-2 text-sm text-gray-700">Producto Destacado</label>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Características (una por línea)</label>
                <textarea name="features" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary"
                    placeholder="Facturación electrónica&#10;Gestión de inventario&#10;Reportes de ventas">{{ old('features') }}</textarea>
            </div>

            <!-- Archivos -->
            <div class="border-t pt-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Archivos</h3>
                
                <!-- Imagen Principal -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Imagen Principal</label>
                    <input type="file" name="image" accept="image/*"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">
                    <p class="text-xs text-gray-500 mt-1">JPG, PNG, GIF. Máximo 2MB</p>
                </div>

                <!-- Screenshots -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Screenshots / Capturas (hasta 10 imágenes)</label>
                    <input type="file" name="screenshots[]" accept="image/*" multiple
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">
                    <p class="text-xs text-gray-500 mt-1">Selecciona hasta 10 imágenes para mostrar en la galería del producto.</p>
                </div>
                
                <!-- APK -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Archivo APK (Android)</label>
                        <input type="file" name="apk_file" accept=".apk"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary">
                        <p class="text-xs text-gray-500 mt-1">Solo archivos .apk. Máximo 100MB</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-6 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">URL Play Store</label>
                        <input type="url" name="playstore_url" value="{{ old('playstore_url') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary"
                            placeholder="https://play.google.com/store/apps/...">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">URL Demo</label>
                        <input type="url" name="demo_url" value="{{ old('demo_url') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-lc-primary"
                            placeholder="https://demo.ejemplo.com">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-4">
                <a href="{{ route('admin.products.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    Cancelar
                </a>
                <button type="submit" class="px-6 py-2 bg-lc-primary text-white rounded-lg hover:bg-lc-secondary transition">
                    <i class="fas fa-save mr-2"></i>Guardar Producto
                </button>
            </div>
        </form>
    </div>
@endsection
