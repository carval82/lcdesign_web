@extends('layouts.admin')

@section('title', 'Ver Mensaje')
@section('header', 'Ver Mensaje')

@section('content')
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Mensaje de {{ $contact->nombre }}</h2>
            <a href="{{ route('admin.contacts.index') }}" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left mr-2"></i>Volver
            </a>
        </div>
        
        <div class="p-6">
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Nombre</label>
                    <p class="text-gray-900 font-medium">{{ $contact->nombre }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                    <p class="text-gray-900">
                        <a href="mailto:{{ $contact->email }}" class="text-indigo-600 hover:underline">{{ $contact->email }}</a>
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Teléfono</label>
                    <p class="text-gray-900">
                        @if($contact->telefono)
                        <a href="tel:{{ $contact->telefono }}" class="text-indigo-600 hover:underline">{{ $contact->telefono }}</a>
                        @else
                        <span class="text-gray-400">No proporcionado</span>
                        @endif
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500 mb-1">Fecha</label>
                    <p class="text-gray-900">{{ $contact->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-500 mb-2">Mensaje</label>
                <div class="p-4 bg-gray-50 rounded-lg text-gray-800 whitespace-pre-wrap">{{ $contact->mensaje }}</div>
            </div>
            
            <div class="flex space-x-4">
                <a href="mailto:{{ $contact->email }}" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    <i class="fas fa-reply mr-2"></i>Responder por Email
                </a>
                @if($contact->telefono)
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->telefono) }}" target="_blank" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                </a>
                @endif
                <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este mensaje?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                        <i class="fas fa-trash mr-2"></i>Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
