<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ChartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $topCourses = $this->chartHelper->getTopServices('Curso');
        $topAuditories = $this->chartHelper->getTopServices('Auditoría');
        return view('admin.index', [
            'topCourses' => $topCourses,
            'topAuditories' => $topAuditories
        ]);
    }

}
