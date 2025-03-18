@extends('layouts.app')
@section('title', 'Crear Invitación de Boda')
@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md overflow-hidden p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Crear Nueva Invitación</h1>

        <form method="POST" action="{{ route('invitations.store') }}">
            @csrf

            <div class="space-y-6">
                <!-- Título -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Título de la Invitación</label>
                    <input type="text" name="title" required placeholder="Ej: Boda de Ana y Carlos"
                        class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('title') border-red-500 @enderror"
                        value="{{ old('title') }}">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nombres -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre del Novio</label>
                        <input type="text" name="groom_name" required placeholder="Ej: Carlos Martínez"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('groom_name') border-red-500 @enderror"
                            value="{{ old('groom_name') }}">
                        @error('groom_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nombre de la Novia</label>
                        <input type="text" name="bride_name" required placeholder="Ej: Ana Sánchez"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('bride_name') border-red-500 @enderror"
                            value="{{ old('bride_name') }}">
                        @error('bride_name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Fecha y Ubicación -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Fecha del Evento</label>
                        <input type="datetime-local" name="event_date" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('event_date') border-red-500 @enderror"
                            value="{{ old('event_date') }}">
                        @error('event_date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ubicación</label>
                        <input type="text" name="location" required placeholder="Ej: Hacienda Las Flores, Ciudad de México"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-300 @error('location') border-red-500 @enderror"
                            value="{{ old('location') }}">
                        @error('location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Botón de enviar -->
                <div class="mt-8">
                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                        Crear Invitación
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
