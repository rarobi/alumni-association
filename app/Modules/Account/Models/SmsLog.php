<?php


namespace App\Modules\Account\Models;


use Illuminate\Database\Eloquent\Model;

class SmsLog extends Model
{
    protected $table = 'sms_logs';

    protected $fillable = [
        'id',
        'sender',
        'receiver_number',
        'message',
        'delivery_status',
        'error_log',
        'created_at',
        'updated_at'
    ];
}