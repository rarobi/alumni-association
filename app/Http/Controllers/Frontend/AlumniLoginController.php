<?php

namespace App\Http\Controllers\frontend;

use App\Events\Frontend\AlumniRegistration;
use App\Models\Auth\User;
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
            $this->sendEmail($request->all());
        }

//        return redirect()->route('alumni.register')->withFlashSuccess('Your Request has beed submitted succesfully.Please wait for confirmation');
        return redirect()->back()->with('message', 'Your Request has beed submitted succesfully. Please wait for confirmation.');
    }

    /**
     * @param $user
     */
    public function sendEmail($user) {

//        dd($user, 4);
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = env('MAIL_HOST');                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = env('MAIL_USERNAME');;                     // SMTP username
            $mail->Password   = env('MAIL_PASSWORD');                               // SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = env('MAIL_PORT');                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('no-reply@mail.com', env('APP_NAME','Help Desk | Daktarbhai'));
            //$mail->addAddress($emailTo, '');     // Add a recipient email, Recipient Name is optional
            $mail->addReplyTo('info@example.com', 'Information');

            $mail->addAddress('prothomrobi1@gmail.com', '');     // Add a recipient
//            $mail->addAddress('ellen@example.com');               // Name is optional
//            $mail->addCC('cc@example.com');
//            $mail->addBCC('bcc@example.com');

            // Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Alumni Registrarion';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            // disable verify_peer, its only for local server
            $serverType = env('APP_ENV');
            if($serverType == 'local'){
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ));
            }


            $mail->send();
            Log::info('Message has been sent') ;

        } catch (Exception $e) {
            $message =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            Log::error($message);
        }
    }


}