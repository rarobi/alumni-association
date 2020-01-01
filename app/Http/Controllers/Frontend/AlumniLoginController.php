<?php

namespace App\Http\Controllers\frontend;

use App\Models\Auth\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlumniLoginController extends Controller
{

    public function loginForm()
    {
        return view('frontend.pages.login');
    }

    public function login(Request $request) {

        $email    = $request->input('email');
        $password = $request->input('password');
        dd($email,$password);
//        return view('frontend.pages.profie');
    }

    public function registerForm()
    {
        return view('frontend.pages.register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->first_name    = $request->input('name');
        $user->email         = $request->input('email');
        $user->mobile        = $request->input('mobile');
        $user->password      = md5($request->input('password'));
        $user->member_status = 'pending';
        $user->save();

        $user_profile = new UserProfile();
        $user_profile->user_id = $user->id;
        $user_profile->batch_id = $request->input('batch_id');
        $user_profile->session = $request->input('session');
        $user_profile->passing_year = $request->input('passing_year');
        $user_profile->save();

//        return redirect()->route('alumni.register')->withFlashSuccess('Your Request has beed submitted succesfully.Please wait for confirmation');
        return redirect()->back()->with('message', 'Your Request has beed submitted succesfully. Please wait for confirmation.');
    }
}