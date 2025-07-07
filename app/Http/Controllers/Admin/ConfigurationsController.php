<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller {
    
    public function index(){
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('admin.configurations', ['settings' => $settings]);
    }

    public function store(Request $request){
        $configs = $request->validate([
            'certificate_validity_time' => 'required|integer|min:1',
        ]);

        foreach ($configs as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        return back()->with('success', 'Configuraciones actualizadas correctamente');
    }

    public function getConfiguration(string $key){
        $config = Setting::where('key', $key)->first();
        return ($config) ? $config->value : null;
    }
}
