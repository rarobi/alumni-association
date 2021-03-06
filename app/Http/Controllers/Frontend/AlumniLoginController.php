<?php

namespace App\Http\Controllers\frontend;

use App\Events\Frontend\AlumniRegistration;
use App\Models\Auth\User;
use App\Models\EmailQueue;
use App\Models\Payment;
use App\Models\UserProfile;
use App\Modules\Settings\Models\Batch;
use App\Modules\Settings\Models\BatchAdminEmail;
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
        $mobile = $request->input('mobile');
        $email  = $request->input('email');

        $duplicate_email = User::where('email', $email)->first();
        if($duplicate_email) {
            return redirect()->back()->with('message', 'This Email already used. Please enter unique email.');
        }

        $rules['paymemt_type'] = 'required';
        if($request->get('paymemt_type') == 'bank'){
            $rules['branch_name'] = 'required';
        } else {
            $rules['transaction_id'] = 'required';
            $rules['transaction_number'] = 'required';
        }

        $this->validate($request, $rules);

        $user = new User();
        $user->first_name    = $request->input('name');
        $user->email         = $email;
        $user->mobile        = $mobile;
        $user->password      = bcrypt($request->input('password'));
        $user->member_status = 'pending';
        $user->member_category = 'general';
        $user->save();

        $user_profile = new UserProfile();
        $user_profile->user_id        = $user->id;
        $user_profile->batch_id       = $request->input('batch_id');
        $user_profile->session        = $request->input('session');
        $user_profile->passing_year   = $request->input('passing_year');
        $user_profile->roll           = $request->input('roll');
        $user_profile->transaction_id = $request->input('transaction_id');
        $user_profile->save();

        $payment = new Payment();
        $payment->user_id        = $user->id;
        $payment->payment_type   = $request->input('paymemt_type');
        $payment->transaction_id = $request->input('transaction_id');
        $payment->transaction_number = $request->input('transaction_number');
        $payment->branch_name    = $request->input('branch_name');
        $payment->payment_date   = $request->input('payment_date');

        $prefix = date('Ymd_'.$mobile.'_');
        $photo = $request->file('document');

        if ($request->file('document')) {
            $mime_type = $photo->getClientMimeType();
            if(!in_array($mime_type,['image/jpeg','image/jpg','image/png'])){
                return redirect('/alumni-register')->with('flash_danger','Document image must be png or jpg or jpeg format!');
            }
            $photoFile = trim(sprintf("%s", uniqid($prefix, true))) .'.'.$photo->getClientOriginalExtension();
            $photo->move('uploads/payment_documents/', $photoFile);
            $payment->document = $photoFile;
        }
        $payment->save();

        if($user_profile->id) {

            $batch_admin_email = BatchAdminEmail::where('batch', $request->input('batch_id'))->first();

            $emailContent = 'A registration request comes from '.$user->first_name.' ('.$user->email.'). Please check the information and take necessary steps.';

            $emailQueue = new EmailQueue();
            $emailQueue->content = $emailContent;
            if(!is_null($batch_admin_email)){
                $emailQueue->to = $batch_admin_email->email;
            } else {
                $emailQueue->to = env('MAIL_USERNAME');
            }
            $emailQueue->cc = null;
            $emailQueue->subject = 'An Alumni Registration Request';
            $emailQueue->status = 1;
            $emailQueue->save();

        }

        return redirect()->back()->with('message', 'Your Request has beed submitted succesfully. Please wait for confirmation.');
    }

}