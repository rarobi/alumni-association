<?php

namespace App\Http\Controllers\frontend;

use App\Models\Auth\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class AlumniLoginController extends Controller
{

    public function loginForm()
    {
        return view('frontend.pages.login');
    }

    public function login(Request $request) {


        $email    = $request->input('email');
        $password = md5($request->input('password'));

        $user_data = array(
            'email' => $email,
            'password' => $password,
        );

//        dd($user_data);
//
        $user   = User::where('email', $email)->where('password', $password)->first();
        dd($user);

//        if (auth()->attempt($user_data, $request->has('remember')))
//        {
//            dd(1);
//            return redirect('main/successlogin');
//        }
//        else
//        {
//            dd(2);
//            return back()->with('error', 'Wrong Login Details');
//        }


//        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            //user sent their email
//            Auth::attempt(['email' => $email, 'password' => $password]);
//        }
//
//        if ( Auth::check() ) {
//            //send them where they are going
//            dd("haha");
////            return redirect()->intended('dashboard');
//        }
//dd(4);

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