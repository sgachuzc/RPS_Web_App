<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ServicesController extends Controller {
    
    public function index(){
        $services = Service::latest()->get();
        return view('admin.services.index', ['services' => $services]);
    }

    public function create(){
        return view('admin.services.create');
    }

    public function store(Request $request){
        $params = $request->validate([
            'name' => ['required'],
            'subtitle' => ['nullable', 'max:100'],
            'type' => ['required', Rule::in(['Curso', 'Auditoría'])],
            'version' => ['nullable'],
            'nomenclature' => ['nullable'],
            'months_to_expire' => ['nullable','numeric'],
            'description' => ['nullable', 'max:255'],
        ]);

        $params['featured'] = $request->has('featured');

        Service::create($params);

        return redirect('/adminonline/services')->with('success', 'Servicio creado correctamente');
    }

    public function edit(Service $service){
        return view('admin.services.edit', ['service' => $service]);
    }

    public function update(Request $request, Service $service){
        $params = $request->validate([
            'name' => ['required'],
            'subtitle' => ['nullable', 'max:100'],
            'type' => ['required', Rule::in(['Curso', 'Auditoría'])],
            'version' => ['nullable'],
            'nomenclature' => ['nullable'],
            'months_to_expire' => ['nullable','numeric'],
            'description' => ['nullable', 'max:255'],
        ]);
        $params['available'] = $request->has('available');
        $params['featured'] = $request->has('featured');
        $params['obsoleted'] = $request->has('obsoleted');
        $service->update($params);
        return redirect('/adminonline/services/')->with('success', 'Servicio actualizado correctamente');
    }

    public function delete(Service $service){
        $service->delete();
        return redirect('/adminonline/services')->with('success', 'Servicio eliminado correctamente');
    }
}
