<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Scope\UserScope;
use App\Models\Auth\Traits\Method\UserMethod;
use App\Models\Auth\Traits\Attribute\UserAttribute;
use App\Models\Auth\Traits\Relationship\UserRelationship;
use App\Models\UserProfile;
use App\Modules\Account\Models\Expense;
use App\Modules\Account\Models\Income;
use App\Modules\Library\Models\Book;

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


}
