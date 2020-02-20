<?php

namespace App\Console\Commands;

use App\Models\Auth\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

class RenewalAlertEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cste:alumni-registration-renewal-alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending email for registration renewal alert';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->SendingRegistrationRenewalAlert();
    }

    public function SendingRegistrationRenewalAlert()
    {
        $today_date = Carbon::now()->format('Y-m-d H:i:s');
        $alert_date = Carbon::parse($today_date)->addMonth(-11)->format('Y-m-d H:i:s');

        $users_email = User::where('created_at', '<=',  $alert_date)->pluck('email')->toArray();

        foreach ($users_email as $user_email){

            $this->emailFormatForRegistartionAlert($user_email);
        }
    }

    private function emailFormatForRegistartionAlert($email){

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = env('MAIL_HOST');                   // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            //TODO:: username and password need to be changed
            $mail->Username   = env('MAIL_USERNAME');              // SMTP username
            $mail->Password   = env('MAIL_PASSWORD');              // SMTP password
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = env('MAIL_PORT');                  // TCP port to connect to


            $emailTo = str_replace("'", "", $email);

            $mail->setFrom('no-reply@mail.com', env('APP_NAME','CSTE Alumni Association'));
            //$mail->addAddress($emailTo, '');     // Add a recipient email, Recipient Name is optional
            $mail->addReplyTo('info@example.com', 'Information');

            if($emailTo){
                $toEmailExplode = explode(',', $emailTo);
                if (!empty($toEmailExplode[1])) {
                    foreach ($toEmailExplode as $toEmail) {
                        $mail->addAddress($toEmail);
                    }
                } else {
                    $mail->addAddress($emailTo);
                }
            }

            // Content
            $mail->isHTML(true); // Set email format to HTML
//            $attachments = ($email->attachment) ? '<br/><a href="' . $email->attachment . '"><u>Click here for downloading the document.</u></a>' : '' ;
            $mail->Subject = 'CSTE Alumni Association Renewal Alert';
            $mail->Body = 'Dear, Thank for your existance in our association.But next month your registration will be expired. please renew registration before expired. Thank You';
            $mail->AltBody = '';

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

            // disable verify_peer, its only for local server


            if (!$mail->send()) {
//                $email->remarks = "Email could not be sent. Mailer Error: $mail->ErrorInfo";
                Log::error("Email could not be sent. Mailer Error: $mail->ErrorInfo");
            }
//            else {
//                $email->remarks = "Email has been sent";
//                $email->sending_status = 1;
//                $email->sent_at = Carbon::now();
//            }
            $mail->ClearAddresses();
            $mail->ClearCCs();

//            $email->save();

        } catch (Exception $e) {
            $message =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            Log::error($message);
        }
    }
}
