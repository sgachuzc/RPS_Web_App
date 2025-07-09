<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ChartHelper;
use App\Helpers\InscriptionsHelper;
use App\Http\Controllers\Controller;
use App\Mail\InscriptionRegistration;
use App\Models\Customer;
use App\Models\Inscription;
use App\Models\Participant;
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
    protected ChartHelper $chartHelper;

    public function __construct(
        InscriptionsHelper $inscriptionHelper,
        ChartHelper $chartHelper
    ){
        $this->inscriptionHelper = $inscriptionHelper;
        $this->chartHelper = $chartHelper;
    }
    
    public function index(){
        $inscriptions = Inscription::with(['customer', 'service'])->latest()->get();
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
        
        Mail::to($inscription->customer->email)->queue(new InscriptionRegistration($inscription, $this->inscriptionHelper));

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

    public function details(Inscription $inscription){
        $inscription->load('service');
        $startDate = \Carbon\Carbon::parse($inscription->start_date)->translatedFormat('d F');
        $endDate = \Carbon\Carbon::parse($inscription->end_date)->translatedFormat('d F');
        $inscriptionPreview = $inscription->service->name.': '.$startDate.' - '.$endDate;

        $service = $inscription->service;
        $participants = $inscription->participants()->with('certificates')->get();
        
        return view('admin.inscriptions.details', [
            'inscription' => $inscription,
            'preview' => $inscriptionPreview,
            'participants' => $participants,
            'service' => $service
        ]);
    }
    
    public function results(Inscription $inscription){
        $startDate = \Carbon\Carbon::parse($inscription->start_date)->translatedFormat('d F');
        $endDate = \Carbon\Carbon::parse($inscription->end_date)->translatedFormat('d F');
        $inscriptionPreview = $inscription->service->name.': '.$startDate.' - '.$endDate;

        $resultsQ1 = $this->chartHelper->getInscriptionQuestionsCounts($inscription->id, 'question_1');
        $resultsQ2 = $this->chartHelper->getInscriptionQuestionsCounts($inscription->id, 'question_2');
        $resultsQ3 = $this->chartHelper->getInscriptionQuestionsCounts($inscription->id, 'question_3');
        $resultsQ4 = $this->chartHelper->getInscriptionQuestionsCounts($inscription->id, 'question_4');
        $resultsQ5 = $this->chartHelper->getInscriptionQuestionsCounts($inscription->id, 'question_5');
        $resultsQ6 = $this->chartHelper->getInscriptionsOpenQuestions($inscription->id, 'question_6');
        $resultsQ7 = $this->chartHelper->getInscriptionsOpenQuestions($inscription->id, 'question_7');

        return view('admin.inscriptions.results', [
            'inscription' => $inscription,
            'preview' => $inscriptionPreview,
            'resultsQ1' => $resultsQ1,
            'resultsQ2' => $resultsQ2,
            'resultsQ3' => $resultsQ3,
            'resultsQ4' => $resultsQ4,
            'resultsQ5' => $resultsQ5,
            'resultsQ6' => $resultsQ6,
            'resultsQ7' => $resultsQ7,
        ]);
    }
}
