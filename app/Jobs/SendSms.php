<?php

namespace App\Jobs;

use App\Modules\Account\Models\SmsLog;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSms implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    public $username;
    public $amount;
    public $number;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($amount,$number)
    {
        $this->number = '88'. substr($number,-11,11);
        $this->amount = $amount;
//        $this->username = $username;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $username = 'erfbd';
        $password = 'Bd@258#Erf';
        $sender = 'Economic Reporters Forum';
        $SMSText = 'You are successfully subscribed '.$this->amount.' TK.Thank You';

        $client = new Client();
        $url = env('API_DOMAIN_URL');
        try {
                $res = $client->request('GET', $url, ['user' => $username, 'password' => $password, 'sender' => $sender, 'SMSText' => $SMSText, 'GSM' => $this->number]);

//            return json_decode($res->getBody()->getContents());
            $response = json_decode($res->getBody()->getContents());

            $smsLog = new SmsLog();
            $smsLog->sender          = $sender;
            $smsLog->receiver_number = $this->number;
            $smsLog->message         = $SMSText;

            if($response > 0) {
                $smsLog->delivery_status  = 'success';
                $smsLog->save();
            } else {
                $smsLog->delivery_status  = 'fail';
                if($response = -1) {
                    $smsLog->error_log  = 'SEND_ERROR';
                } elseif ($response = -2){
                    $smsLog->error_log  = 'NOT_ENOUGH_CREDITS';
                } elseif ($response = -3){
                    $smsLog->error_log  = 'NETWORK_NOT_COVERED';
                } elseif ($response = -4){
                    $smsLog->error_log  = 'SOCKET_EXCEPTION';
                } elseif ($response = -5){
                    $smsLog->error_log  = 'INVALID_USER_OR_PASS';
                } elseif ($response = -6){
                    $smsLog->error_log  = 'MISSING_DESTINATION_ADDRESS';
                } elseif ($response = -7){
                    $smsLog->error_log  = 'MISSING_SMS_TEXT';
                } elseif ($response = -8){
                    $smsLog->error_log  = 'MISSING_SENDER_NAME';
                } elseif ($response = -9){
                    $smsLog->error_log  = 'DEST_ADDR_INVALID_FORMAT';
                } elseif ($response = -10){
                    $smsLog->error_log  = 'MISSING_USERNAME';
                } elseif ($response = -11){
                    $smsLog->error_log  = 'MISSING_PASS';
                } elseif ($response = -13){
                    $smsLog->error_log  = 'INVALID_DESTINATION_ADDRESS';
                }

                $smsLog->save();
            }
        } catch (\Exception $e) {
            $data['status_code'] = $e->getCode();
            $data['messages'] = $e->getMessage();
            $result = response()->json($data);

//            return json_decode($result->getContent());
            $response = json_decode($result->getContent());

        }
    }
}
