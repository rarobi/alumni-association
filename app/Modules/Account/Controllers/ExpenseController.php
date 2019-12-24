<?php

namespace App\Modules\Account\Controllers;

use App\Models\Auth\User;
use App\Modules\Account\Models\Account;
use App\Modules\Account\Models\Expense;
use App\Modules\Account\Models\Income;
use App\Modules\Account\Models\Purpose;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function index()
    {
        $data['expenses'] = Expense::all();
        $data['purposes'] = Purpose::where('status',1)->pluck('purpose','id');
        return view("Account::expense.index", $data);
    }

    public function store(Request $request){

        $this->validate($request, [
            'amount' => 'required',
            'transaction_date' => 'required'
        ]);

        $purposeText = null;
        $purposeId = null;
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


        $expense = new Expense();
        $expense->amount  = $request->get('amount');
        $expense->purpose = $purposeText;
        $expense->purpose_id = $purposeId;
        $expense->transaction_date = $request->get('transaction_date');
        $expense->save();

        $account = new Account();
        $account->ref_id = $expense->id;
        $account->transaction_type = 'expense';
        $account->transaction_date = $expense->transaction_date;
        $account->amount = $expense->amount;
        $account->save();
        return redirect()->route('account.expense.index')->withFlashSuccess('Record saved successfully.');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function show($expenseId)
    {
        $data['expense'] = Expense::find($expenseId);
       return view("Account::expense.show", $data);
    }



}
