<?php

namespace App\Modules\Account\Controllers;

use App\Events\Backend\SendSmsToMember;
use App\Models\Auth\User;
use App\Modules\Account\Models\Account;
use App\Modules\Account\Models\Expense;
use App\Modules\Account\Models\Income;
use App\Modules\Account\Models\Purpose;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function index()
    {
        $data['members'] = User::pluck('name','id');
        $data['incomes'] = Income::all();
        $data['purposes'] = Purpose::where('status',1)
            ->orderBy('id','desc')
            ->pluck('purpose','id');

        return view("Account::income.index",$data);
    }

    public function store(Request $request){


        $rules['payment_type'] = 'required';
        $rules['amount'] = 'required';
        $rules['transaction_date'] = 'required';
        if($request->get('payment_type') == 'others'){
            $rules['purpose_id'] = 'required';
        }

        $this->validate($request, $rules);

        $purposeText = 'Membership';
        $purposeId = null;
        if($request->get('payment_type') == 'others'){
            if($request->get('purpose')){
                $purpose = new Purpose();
                $purpose->purpose = $request->get('purpose');
                $purpose->save();
                $purposeText = $request->get('purpose');
                $purposeId = $purpose->id;
            }else{
                $purpose = Purpose::find($request->get('purpose_id'));
                $purposeId = $request->get('purpose_id');
                $purposeText = $purpose->purpose;
            }
        }


        $income = new Income();
        $income->payment_type = $request->get('payment_type');
        $income->member_id = $request->get('member_id');
        $income->purpose_id = $purposeId;
        $income->purpose = $purposeText;
        $income->amount  = $request->get('amount');
        $income->transaction_date = $request->get('transaction_date');
        $income->save();

        $account = new Account();
        $account->ref_id = $income->id;
        $account->transaction_type = 'income';
        $account->transaction_date = $income->transaction_date;
        $account->amount = $income->amount;
        $account->save();

        if($request->has('member_id')){
            $member = User::find($income->member_id);
            event(new SendSmsToMember($member->mobile, $account->amount));
        }

        return redirect()->route('account.income.index')->withFlashSuccess('Record saved successfully.');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function show($incomeId)
    {
        $data['income'] = Income::find($incomeId);
       return view("Account::income.show",$data);
    }



}
