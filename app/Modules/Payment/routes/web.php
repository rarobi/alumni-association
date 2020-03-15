<?php

Route::group(['module' => 'Payment', 'middleware' => ['web'], 'namespace' => 'App\Modules\Payment\Controllers'], function() {

    Route::get('payment/search', 'PaymentController@search')->name('payment.search');

    Route::resource('payment', 'PaymentController');

});
