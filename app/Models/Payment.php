<?php
/**
 * Created by PhpStorm.
 * User: sajan
 * Date: 1/23/20
 * Time: 10:03 AM
 */

namespace App\Models;


use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    public function user() {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}