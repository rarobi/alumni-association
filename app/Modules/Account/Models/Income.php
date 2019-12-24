<?php

namespace App\Modules\Account\Models;

use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Income extends Model {

    protected $table = 'income';
    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'purpose	',
        'created_by',
        'updated_by',
        'deleted_by	',
        'created_at',
        'updated_at'
    ];

    public function creator(){
        return $this->belongsTo(User::class,'created_by');
    }

    public static function boot() {
        parent::boot();
        // Before update
        static::creating(function($book) {
            $book->created_by = Auth::user()->id;
            $book->updated_by = Auth::user()->id;
        });

        static::updating(function($book) {
            $book->updated_by = Auth::user()->id;
        });
    }
}
