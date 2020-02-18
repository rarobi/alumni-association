<?php
/**
 * Created by PhpStorm.
 * User: sajan
 * Date: 1/28/20
 * Time: 9:28 AM
 */

namespace App\Modules\Payment\Models;


use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class StorePaymentInfo extends Model
{
    protected $table = "store_payment_info";

    public function user(){
        return $this->belongsTo(User::class,'created_by','id');
    }
}