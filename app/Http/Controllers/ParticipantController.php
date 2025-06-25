<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller {
    
    public function showForm(string $token){
        $inscription = Inscription::where('registration_token', $token)->firstOrFail();
        return view('participants.register', ['inscription' => $inscription]);
    }

    public function register(Request $request, string $token){
        $inscription = Inscription::where('registration_token', $token)->firstOrFail();
        $params = $request->validate([
            'name' => ['required'],
            'email' => ['required','email'],
            'phone' => ['required', 'digits:10', 'max:10']
        ]);
        $params['inscription_id'] = $inscription->id;
        Participant::create($params);
        return redirect()->back()->with('success', '¡Registro exitoso!');
    }
}
