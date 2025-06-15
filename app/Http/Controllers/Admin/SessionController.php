<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller {
    
    public function login(Request $request){
        $credentials = request()->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                "password" => "Credenciales incorrectas."
            ]);
        }

        request()->session()->regenerate();

        return redirect('/adminonline/index');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect("/adminonline");
    }
}
