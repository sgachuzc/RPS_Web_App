<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\InscriptionsHelper;
use App\Http\Controllers\Controller;
use App\Mail\InscriptionRegistration;
use App\Models\Customer;
use App\Models\Inscription;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class InscriptionsController extends Controller {

    const STATUS_START = 'INICIO';
    const STATUS_IN_PROGRESS = 'ACTIVO';
    const STATUS_FINAL = 'CONCLUIDO';

    protected InscriptionsHelper $inscriptionHelper;

    public function __construct(
        InscriptionsHelper $inscriptionHelper
    ){
        $this->inscriptionHelper = $inscriptionHelper;
    }
    
    public function index(){
        $inscriptions = Inscription::latest()->get();
        return view('admin.inscriptions.index', [
            'inscriptions' => $inscriptions,
            'statusStart' => self::STATUS_START,
            'statusInProgress' => self::STATUS_IN_PROGRESS,
            'statusFinal' => self::STATUS_FINAL
        ]);
    }

    public function create(){
        $customers = Customer::all();
        $services = Service::where('available','=',true)->get();
        return view('admin.inscriptions.create',[
            'customers' => $customers,
            'services' => $services
        ]);
    }

    public function store(Request $request){
        $params = $request->validate([
            'customer_id' => ['required','exists:customers,id'],
            'service_id' => ['required','exists:services,id'],
            'start_date' => ['required','date','after_or_equal:today'],
            'end_date' => ['required','date','after_or_equal:today']
        ]);
        $params['status'] = self::STATUS_START;
        $inscription = Auth::user()->inscriptions()->create($params);
        $token = $this->inscriptionHelper->generateToken($inscription->id);
        $inscription->registration_token = $token;
        $inscription->save();
        
        Mail::to($inscription->customer->email)->send(new InscriptionRegistration($inscription, $this->inscriptionHelper));

        return redirect('/adminonline/inscriptions')->with('success','Se hizo la inscripción correctamente');
    }

    public function edit(Inscription $inscription){
        return view('admin.inscriptions.edit', [
            'inscription' => $inscription,
            'statusStart' => self::STATUS_START,
            'statusInProgress' => self::STATUS_IN_PROGRESS,
            'statusFinal' => self::STATUS_FINAL
        ]);
    }

    public function updateStatus(Inscription $inscription){
        $inscription = Inscription::findOrFail($inscription->id);
        if (!$inscription) {
            return redirect('/adminonline/inscriptions')->with('success','No existe el registro');
        }

        $user = Auth::user();
        $currentPassword = request()->input('current_password');
        if (!Hash::check($currentPassword, $user->password)) {
            throw ValidationException::withMessages([
                "current_password" => "Contraseña incorrecta"
            ]);
        }

        $validStatuses = [
            self::STATUS_START,
            self::STATUS_IN_PROGRESS,
            self::STATUS_FINAL
        ];
        $params = request()->validate([
            'status' => ['required', 'in:' . implode(',', $validStatuses)]
        ]);
        $inscription->update($params);
        return redirect('/adminonline/inscriptions')->with('success','Estatus actualizado');
    }

    public function updateDates(Inscription $inscription){
        $inscription = Inscription::findOrFail($inscription->id);
        if (!$inscription) {
            return redirect('/adminonline/inscriptions')->with('success','No existe el registro');
        }

        $user = Auth::user();
        $currentPassword = request()->input('current_password_dates');
        if (!Hash::check($currentPassword, $user->password)) {
            throw ValidationException::withMessages([
                "current_password_dates" => "Contraseña incorrecta"
            ]);
        }
        
        $params = request()->validate([
            'start_date' => ['required','date','after_or_equal:today'],
            'end_date' => ['required','date','after_or_equal:today']
        ]);
        $inscription->update($params);
        return redirect('/adminonline/inscriptions')->with('success','Fechas actualizadas');
    }

    public function delete(Inscription $inscription){
        $inscription->delete();
        return redirect('/adminonline/inscriptions')->with('success','Inscripción eliminada');
    }
}
