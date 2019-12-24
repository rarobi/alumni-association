<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlumniLoginController extends Controller
{

    public function loginForm(){
        return view('frontend.pages.login');
    }

    public function registerForm(){
        return view('frontend.pages.register');
    }
}
