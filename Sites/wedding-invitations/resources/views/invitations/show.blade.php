@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-rose-50 p-4">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
            <!-- Encabezado -->
            <img src="{{ asset($invitation->cover_image ?? 'default-cover.jpg') }}"
                class="w-full h-48 object-cover rounded-lg mb-4">
            <h1 class="text-3xl font-bold text-center mb-4">{{ $invitation->title }}</h1>

            <!-- Detalles -->
            <div class="text-center space-y-2">
                <p class="text-xl">{{ $invitation->groom_name }} & {{ $invitation->bride_name }}</p>
                <p class="text-gray-600">
                    📅 {{ \Carbon\Carbon::parse($invitation->event_date)->isoFormat('dddd D [de] MMMM [de] YYYY') }}<br>
                    🕒 {{ \Carbon\Carbon::parse($invitation->event_date)->format('H:i') }} horas
                <p class="text-gray-800 mt-4">📍 {{ $invitation->location }}</p>
                <a href="https://maps.google.com/?q={{ urlencode($invitation->location) }}"
                    class="inline-block mt-2 text-rose-600 hover:text-rose-700" target="_blank">
                    Ver en mapa
                </a>
            </div>

            <!-- Formulario RSVP -->
            <form method="POST" action="{{ route('rsvp.store', $invitation->unique_code) }}" class="mt-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-gray-700 mb-2">Nombre completo</label>
                    <input type="text" name="name" required
                        class="w-full p-2 border rounded-lg @error('name') border-red-500 @enderror"
                        placeholder="Ej. Juan Pérez">
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">Correo electrónico (opcional)</label>
                    <input type="email" name="email" class="w-full p-2 border rounded-lg"
                        placeholder="ejemplo@email.com">
                </div>

                <div>
                    <label class="block text-gray-700 mb-2">¿Asistirás?</label>
                    <select name="attending" required
                        class="w-full p-2 border rounded-lg @error('attending') border-red-500 @enderror">
                        <option value="1">¡Sí, estaré allí! 🎉</option>
                        <option value="0">Lamentablemente no podré asistir 😢</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-rose-600 text-white py-2 rounded-lg hover:bg-rose-700 transition-colors">
                    Enviar Confirmación
                </button>
            </form>

            @if (session('status'))
                <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
@endsection
