<?php

Route::group(['module' => 'Account', 'middleware' => ['web'], 'namespace' => 'App\Modules\Account\Controllers'], function() {

    Route::resource('account/income', 'IncomeController', ['names' => [
        'index'     => 'account.income.index',
        'create'    => 'account.income.create',
        'store'     => 'account.income.store',
        'show'      => 'account.income.show',
    ]]);

    Route::resource('account/expense', 'ExpenseController', ['names' => [
        'index'     => 'account.expense.index',
        'create'    => 'account.expense.create',
        'store'     => 'account.expense.store',
        'show'      => 'account.expense.show',
    ]]);

    Route::get('account/list/{param}','AccountController@paramWiseAccountList');
});
