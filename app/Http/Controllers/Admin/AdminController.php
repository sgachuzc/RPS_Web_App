<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ChartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller {

    protected ChartHelper $chartHelper;

    public function __construct(
        ChartHelper $chartHelper
    ){
        $this->chartHelper = $chartHelper;
    }
    
    public function adminOnline(Request $request){
        return view('admin.login');
    }

    public function index(){
        $topCourses = $this->chartHelper->getTopServices('Curso');
        $topAuditories = $this->chartHelper->getTopServices('Auditoría');
        return view('admin.index', [
            'topCourses' => $topCourses,
            'topAuditories' => $topAuditories
        ]);
    }

    public function profile(){
        $user = Auth::user();
        return view('admin.profile', ['user' => $user]);
    }

    public function updateEmail(Request $request){
        $user = Auth::user();
        $currentPassword = $request->input('current_password');

        if (!Hash::check($currentPassword, $user->password)) {
            throw ValidationException::withMessages([
                "current_password" => "Contraseña incorrecta"
            ]);
        }

        $params = $request->validate([
            'email' => ['required', 'email', 'unique:users,email']
        ]);

        $user->update($params);
        return redirect('/adminonline/profile')->with('success', 'Email actualizado correctamente');
    }

    public function updatePassword(Request $request){
        $user = Auth::user();
        $currentPassword = $request->input('current_password_updated');

        if (!Hash::check($currentPassword, $user->password)) {
            throw ValidationException::withMessages([
                "current_password_updated" => "Contraseña actual incorrecta"
            ]);
        }

        $params = $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()->symbols()],
        ]);

        $user->update($params);
        return redirect('/adminonline/profile')->with('success', 'Contraseña actualizada correctamente');
    }

}
