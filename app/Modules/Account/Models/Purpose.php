<?php

namespace App\Modules\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Purpose extends Model {

    protected $table = 'purpose';
    protected $fillable = [
        'id',
        'name',
        'status',
        'created_by',
        'updated_by',
        'is_archive',
        'created_at',
        'updated_at'
    ];


//    public static function boot() {
//        parent::boot();
//        // Before update
//        static::creating(function($purpose) {
//            $purpose->created_by = Auth::user()->id;
//            $purpose->updated_by = Auth::user()->id;
//        });
//
//        static::updating(function($purpose) {
//            $purpose->updated_by = Auth::user()->id;
//        });
//    }


}
