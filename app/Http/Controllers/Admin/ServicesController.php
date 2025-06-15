<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ServicesController extends Controller {
    
    public function index(){
        $services = Service::all();
        return view('admin.services.index', ['services' => $services]);
    }

    public function create(){
        return view('admin.services.create');
    }

    public function store(Request $request){
        $params = $request->validate([
            'name' => ['required'],
            'subtitle' => ['required'],
            'description' => ['required'],
            'type' => ['required', Rule::in(['Curso', 'Auditoría'])],
        ]);

        $params['featured'] = $request->has('featured');

        Auth::user()->services()->create($params);

        return redirect('/adminonline/services')->with('success', 'Servicio creado correctamente');
    }
}
