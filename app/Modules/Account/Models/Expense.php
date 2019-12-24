<?php


namespace App\Modules\Account\Models;


use App\Models\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Expense extends Model
{
    protected $table = 'expense';
    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'purpose',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at'
    ];

    public static function boot() {
        parent::boot();
        // Before update
        static::creating(function($expense) {
            $expense->created_by = Auth::user()->id;
            $expense->updated_by = Auth::user()->id;
        });

        static::updating(function($expense) {
            $expense->updated_by = Auth::user()->id;
        });
    }
}
