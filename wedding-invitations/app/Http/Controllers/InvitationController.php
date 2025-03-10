<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('invitations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'groom_name' => 'required',
            'bride_name' => 'required',
            'event_date' => 'required|date',
            'location' => 'required',
            'description' => 'nullable' // ← Campo opcional
        ]);

        // El unique_code se genera automáticamente desde el modelo
        Auth::user()->invitations()->create($validated);

        return redirect()->route('dashboard')->with('success', 'Invitación creada!');
    }
    /**
     * Display the specified resource.
     */
  // Método para mostrar la invitación pública
  public function show($unique_code)
  {
      $invitation = Invitation::where('unique_code', $unique_code)
          ->with('guests') // Carga los invitados relacionados
          ->firstOrFail();

      return view('invitations.show', compact('invitation'));
  }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        //
    }
}
