<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ChartHelper;
use App\Http\Controllers\Admin\InscriptionsController;
use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Customer;
use App\Models\Inscription;
use App\Models\Participant;
use Carbon\Carbon;
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
        $topServices = $this->chartHelper->getTopServices();
        $nextInscriptions = Inscription::with('service', 'customer')->where('status', InscriptionsController::STATUS_START)
            ->where('start_date', '>=', Carbon::now())
            ->orderBy('start_date', 'asc')
            ->limit(5)
            ->get();
        $totalCustomers = Customer::count();
        $totalCompletedInscriptions = Inscription::with('service')->where('status', InscriptionsController::STATUS_FINAL)->count();
        $totalParticipants = Participant::count();
        $totalCertificates = Certificate::count();

        return view('admin.index', [
            'nextInscriptions' => $nextInscriptions,
            'totalCustomers' => $totalCustomers,
            'totalCompletedInscriptions' => $totalCompletedInscriptions,
            'totalParticipants' => $totalParticipants,
            'totalCertificates' => $totalCertificates,
            'topServices' => $topServices
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
            'password' => ['required', 'confirmed', Password::min(8)->max(20)->letters()->numbers()],
        ]);

        $user->update($params);
        return redirect('/adminonline/profile')->with('success', 'Contraseña actualizada correctamente');
    }

}
