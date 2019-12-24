<?php

namespace App\Modules\Account\Controllers;
use App\DataTables\AccountListDataTable;
use App\Http\Controllers\Controller;
use App\Modules\Account\Models\Account;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

    }


    public function paramWiseAccountList($param, AccountListDataTable $dataTable){
        $listName = '';
        $params['list_type'] = $param;
        switch ($param) {
            case 'all':
                $listName = "Total";
                break;
            case 'today':
                $listName = "Today";
                break;
            case 'january':
                $listName = "January";
                break;
            case 'february':
                $listName = "February";
                break;
            case 'march':
                $listName = "March";
                break;
            case 'april':
                $listName = "April";
                break;
            case 'may':
                $listName = "May";
                break;
            case 'june':
                $listName = "June";
                break;
            case 'july':
                $listName = "July";
                break;
            case 'august':
                $listName = "August";
                break;
            case 'september':
                $listName = "September";
                break;
            case 'october':
                $listName = "October";
                break;
            case 'november':
                $listName = "November";
                break;
            case 'december':
                $listName = "December";
                break;
            default:
                return redirect('/dashboard');
        }
        $currentMonth = strtolower(date('F'));
        $statistics = $this->getSalesStatistics($param);
        return $dataTable->with($params)->render('Account::index',compact('param','listName','currentMonth','statistics'));
    }

    public function getSalesStatistics($param){
        $query = Account::paramBasedList($param);
        $statistics = $query->groupBy('accounts.transaction_type')
                ->get([
                    DB::raw("accounts.transaction_type"),
                    DB::raw("SUM(accounts.amount) AS transaction_amount")
                ]);

        $data = [];
        $data['total_income'] = 0;
        $data['total_expense'] = 0;

        foreach($statistics as $statistic){
            if($statistic->transaction_type == 'income'){
                $data['total_income'] = $statistic->transaction_amount;
            }elseif($statistic->transaction_type == 'expense'){
                $data['total_expense'] = $statistic->transaction_amount;
            }
        }

        $data['balance'] = $data['total_income'] - $data['total_expense'];

        return (object)$data;
    }


}
