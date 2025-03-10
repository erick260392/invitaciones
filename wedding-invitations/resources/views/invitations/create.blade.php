@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear Nueva Invitación</h1>

    <form method="POST" action="{{ route('invitations.store') }}" class="max-w-md">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Título de la Invitación</label>
            <input type="text" name="title" required
                class="w-full p-2 border rounded-lg @error('title') border-red-500 @enderror"
                value="{{ old('title') }}">
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nombre del Novio</label>
            <input type="text" name="groom_name" required
                class="w-full p-2 border rounded-lg @error('groom_name') border-red-500 @enderror"
                value="{{ old('groom_name') }}">
            @error('groom_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Nombre de la Novia</label>
            <input type="text" name="bride_name" required
                class="w-full p-2 border rounded-lg @error('bride_name') border-red-500 @enderror"
                value="{{ old('bride_name') }}">
            @error('bride_name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Fecha del Evento</label>
            <input type="datetime-local" name="event_date" required
                class="w-full p-2 border rounded-lg @error('event_date') border-red-500 @enderror"
                value="{{ old('event_date') }}">
            @error('event_date')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Ubicación</label>
            <input type="text" name="location" required
                class="w-full p-2 border rounded-lg @error('location') border-red-500 @enderror"
                value="{{ old('location') }}">
            @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
            class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
            Crear Invitación
        </button>
    </form>
</div>
@endsection
