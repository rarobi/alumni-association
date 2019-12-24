<?php

namespace App\Modules\Account\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Account extends Model {

    protected $table = 'accounts';
    protected $fillable = [
        'id',
        'ref_id',
        'amount_type',
        'amount',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at'
    ];


    public static function boot() {
        parent::boot();
        // Before update
        static::creating(function($account) {
            $account->created_by = Auth::user()->id;
            $account->updated_by = Auth::user()->id;
        });

        static::updating(function($account) {
            $account->updated_by = Auth::user()->id;
        });
    }

    public static function paramBasedList($param)
    {
        $query = Account::where('accounts.transaction_date', '!=', null)
                    ->leftJoin('income',function ($join){
                        $join->on('income.id','=','accounts.ref_id');
                        $join->where('accounts.transaction_type','=','income');
                    })
                    ->leftJoin('expense',function ($join){
                        $join->on('expense.id','=','accounts.ref_id');
                        $join->where('accounts.transaction_type','=','expense');
                    });

        switch ($param) {
            case 'all':
                break;

            case 'today':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [date('m')])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')])
                    ->whereRaw('DAY(accounts.transaction_date) = ?', [date('d')]);
                break;

            case 'january':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [1])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'february':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [2])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'march':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [3])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'april':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [4])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'may':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [5])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'june':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [6])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'july':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [7])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'august':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [8])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'september':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [9])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'october':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [10])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'november':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [11])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            case 'december':
                $query->whereRaw('MONTH(accounts.transaction_date) = ?', [12])
                    ->whereRaw('YEAR(accounts.transaction_date) = ?', [date('Y')]);
                break;

            default:
                return false;
        }

        return $query->orderBy('accounts.id', 'desc');
        }

    }


