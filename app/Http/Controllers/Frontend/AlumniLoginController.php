<?php

namespace App\Http\Controllers\frontend;

use App\Events\Frontend\AlumniRegistration;
use App\Models\Auth\User;
use App\Models\EmailQueue;
use App\Models\UserProfile;
use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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

        return view('frontend.pages.profie');
    }

    public function registerForm()
    {
        $data['batches'] = Batch::pluck('name','id');
        $data['sessions'] = Session::pluck('session', 'session');

        return view('frontend.pages.register', $data);
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->first_name    = $request->input('name');
        $user->email         = $request->input('email');
        $user->mobile        = $request->input('mobile');
        $user->password      = bcrypt($request->input('password'));
        $user->member_status = 'pending';
        $user->save();

        $user_profile = new UserProfile();
        $user_profile->user_id        = $user->id;
        $user_profile->batch_id       = $request->input('batch_id');
        $user_profile->session        = $request->input('session');
        $user_profile->passing_year   = $request->input('passing_year');
        $user_profile->roll           = $request->input('roll');
        $user_profile->transaction_id = $request->input('transaction_id');
        $user_profile->save();

        if($user_profile->id) {

            $emailContent = 'A registration request comes from '.$user->first_name.' ('.$user->email.'). Please check the information and take necessary steps.';

            $emailQueue = new EmailQueue();
            $emailQueue->content = $emailContent;
            $emailQueue->to = env('MAIL_USERNAME');
            $emailQueue->cc = null;
            $emailQueue->subject = 'An Alumni Registration Request';
            $emailQueue->status = 1;
            $emailQueue->save();

        }

        return redirect()->back()->with('message', 'Your Request has beed submitted succesfully. Please wait for confirmation.');
    }

}