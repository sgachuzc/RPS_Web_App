<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class AdminController extends Controller {
    
    public function adminOnline(Request $request){
        return view('admin.login');
    }

    public function index(){
        return view('admin.index');
    }

}
