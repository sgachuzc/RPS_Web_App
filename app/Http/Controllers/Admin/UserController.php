<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller {
    
    public function index(){
        $users = User::where('id','!=',Auth::id())->get();
        return view('admin.users', ['users' => $users]);
    }

    public function create(){
        return view('admin.users_create');
    }

    public function store(Request $request){
        $params = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()],
        ]);

        User::create($params);
        return redirect('/adminonline/usuarios')->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $user){
        return view('admin.users_edit', ['user' => $user]);
    }

    public function update(User $user){
        request()->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()],
        ]);
    
        $user->update([
            'email' => request('email'),
            'password' => request('password')
        ]);
    
        return redirect('/adminonline/usuarios');
    }

    public function delete(User $user){
        $user->delete();
        return redirect('/adminonline/usuarios');
    }
}
