<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InscriptionsController extends Controller {
    
    public function index(){
        $inscriptions = Inscription::latest()->get();
        return view('admin.inscriptions.index', ['inscriptions' => $inscriptions]);
    }

    public function create(){
        $services = Service::where('available', '=', true)->get();
        return view('admin.inscriptions.create', ['services' => $services]);
    }

    public function store(Request $request){
        $params = $request->validate([
            'customer' => ['required'],
            'phone' => ['required'],
            'email' => ['required','email'],
            'service_id' => ['required','exists:services,id'],
            'application_date' => ['required', 'date']
        ]);

        Auth::user()->inscriptions()->create($params);

        return redirect('/adminonline/inscriptions')->with('success', 'Inscrito correctamente');
    }

    public function edit(Inscription $inscription){
        return view('admin.inscriptions.edit', ['inscription' => $inscription]);
    }

    public function update(Request $request, Inscription $inscription){
        $inscription = Inscription::findOrFail($inscription->id);

        if (!$inscription) {
            return redirect('/adminonline/inscriptions/')->with('success', 'No existe registro');
        }
        
        $request->validate([
            'phone' => ['required'],
            'email' => ['required','email'],
            'application_date' => ['required', 'date']
        ]);

        $inscription->phone = $request->phone;
        $inscription->email = $request->email;
        $inscription->application_date = $request->application_date;
        $inscription->save();

        return redirect('/adminonline/inscriptions/')->with('success', 'Inscripción actualizada correctamente');
    }

    public function updateStatus(Request $request, Inscription $inscription){
        $inscription = Inscription::findOrFail($inscription->id);

        if (!$inscription) {
            return redirect('/adminonline/inscriptions/')->with('success', 'No existe registro');
        }
        
        $request->validate([
            'status' => ['required', Rule::in(['Inicial','En curso','Finalizado'])],
        ]);

        $inscription->status = $request->status;
        $inscription->save();
        return redirect('/adminonline/inscriptions/')->with('success', 'Estatus actualizado');
    }

    public function delete(Inscription $inscription){
        $inscription->delete();
        return redirect('/adminonline/inscriptions/')->with('success', 'Inscripción cancelada');
    }
}
