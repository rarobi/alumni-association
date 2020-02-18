<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Scope\UserScope;
use App\Models\Auth\Traits\Method\UserMethod;
use App\Models\Auth\Traits\Attribute\UserAttribute;
use App\Models\Auth\Traits\Relationship\UserRelationship;
use App\Models\Payment;
use App\Models\UserProfile;
use App\Modules\Payment\Models\StorePaymentInfo;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;

    public function profile(){
        return $this->hasOne(UserProfile::class,'user_id','id');
    }

    public function payment() {
        return $this->hasOne(Payment::class,'user_id', 'id');
    }

    public function storePayment() {
        return $this->hasMany(StorePaymentInfo::class,'created_by', 'id');
    }


}
