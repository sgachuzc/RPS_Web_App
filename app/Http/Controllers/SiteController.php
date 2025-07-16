<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class SiteController extends Controller {
    
    public function index(){
        $courses = Service::where('type', 'Curso')->where('available', true)->where('featured', true)->get();
        return view('index', ['courses' => $courses]);
    }

    public function courses(){
        $courses = Service::where('type', 'Curso')->where('available', true)->latest()->get()->groupBy('featured');

        return view('courses', ['featuredCourses' => $courses[1], 'courses' => $courses[0] ]);
    }

    
}
