<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller {
    
    public function __invoke(){
        $courses = Service::where('type', 'Curso')->where('available', true)->where('name', 'like','%'.request('q').'%')->get();
        return view('results', ['courses' => $courses]);
    }
}
