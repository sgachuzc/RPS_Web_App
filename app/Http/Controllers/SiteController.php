<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteController extends Controller {
    
    public function index(){
        $courses = Service::where('type', 'Curso')->where('available', true)->where('featured', true)->get();
        $setting = Setting::where('key', 'whatsapp_phone')->first();
        $phone = ($setting) ? $setting->value : '#';
        $link = 'https://wa.me/52'.$phone;
        return view('index', [
            'courses' => $courses,
            'link' => $link
        ]);
    }

    public function courses(){
        $courses = Service::where('type', 'Curso')->where('available', true)->latest()->get()->groupBy('featured');

        return view('courses', ['featuredCourses' => $courses[1], 'courses' => $courses[0] ]);
    }

    public function services(){
        $auditories = Service::where('type', 'Auditoría')->where('available', true)->latest()->get();
        return view('services', ['auditories' => $auditories]);
    }

    public function details(Service $service){
        return view('details', ['service' => $service]);
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
    
}
