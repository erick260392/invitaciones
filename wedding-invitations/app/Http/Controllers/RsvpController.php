<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function store(Request $request, Invitation $invitation)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'attending' => 'required|boolean',
        ]);

        $invitation->guests()->create($validated);

        return back()->with('status', '¡Confirmación recibida! Gracias por responder.');
    }
}
