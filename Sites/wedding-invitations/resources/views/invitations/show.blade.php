<div class="min-h-screen bg-rose-50 p-4">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
        <img src="{{ $invitation->cover_image }}" class="w-full h-48 object-cover rounded-lg mb-4">
        <h1 class="text-3xl font-bold text-center mb-4">{{ $invitation->title }}</h1>
        <div class="text-center space-y-2">
            <p class="text-xl">{{ $invitation->groom_name }} & {{ $invitation->bride_name }}</p>
            <p class="text-gray-600">{{ $invitation->event_date->format('d M Y H:i') }}</p>
            <p class="text-gray-800 mt-4">{{ $invitation->location }}</p>
        </div>
        <div class="mt-6">
            <button class="bg-rose-600 text-white w-full py-2 rounded-lg">Confirmar Asistencia</button>
        </div>
    </div>
</div>
