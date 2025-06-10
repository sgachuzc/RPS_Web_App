<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class AdminController extends Controller {
    
    public function adminOnline(Request $request){
        return view('admin.login');
    }

    public function index(){
        return view('admin.index');
    }

    public function users(User $user){
        return view('admin.users', ['users' => $user->all()]);
    }

    public function createUser(){
        return view('admin.users_create');
    }

    public function storeUser(Request $request){
        $params = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()],
        ]);

        User::create($params);
        return redirect('/adminonline/usuarios')->with('success', 'Usuario creado correctamente');
    }

}
