<?php

Route::group(['module' => 'Payment', 'middleware' => ['web'], 'namespace' => 'App\Modules\Payment\Controllers'], function() {

    Route::resource('payment', 'PaymentController');

});
