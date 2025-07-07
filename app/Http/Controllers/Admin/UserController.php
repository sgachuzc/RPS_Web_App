<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserController extends Controller {
    
    public function index(){
        $users = User::where('id','!=',Auth::id())->with('role')->latest()->get();
        return view('admin.users.index', ['users' => $users]);
    }

    public function create(){
        $roles = Role::all();
        return view('admin.users.create', ["roles" => $roles]);
    }

    public function store(Request $request){
        $params = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'role_id' => ['required', 'exists:roles,id'],
            'password' => ['required', 'confirmed', Password::min(8)->max(20)->letters()->numbers()],
        ]);

        User::create($params);
        return redirect('/adminonline/users')->with('success', 'Usuario creado correctamente');
    }

    public function edit(User $user){
        $user->load('role');
        $roles = Role::all();
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(User $user){
        $userAuthenticated = Auth::user();
        $currentPassword = request()->input('current_password');
        if (!Hash::check($currentPassword, $userAuthenticated->password)) {
            throw ValidationException::withMessages([
                "current_password" => "Contraseña incorrecta"
            ]);
        }
        $params = request()->validate([
            'role_id' => ['required', 'exists:roles,id'],
        ]);
        $user->update($params);
        return redirect('/adminonline/users')->with('success', 'Rol de usuario actualizado correctamente');
    }

    public function delete(User $user){
        $user->delete();
        return redirect('/adminonline/users')->with('success', 'Usuario eliminado correctamente');
    }
}
