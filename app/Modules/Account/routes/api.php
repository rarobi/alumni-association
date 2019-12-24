<?php

Route::group(['module' => 'Account', 'middleware' => ['api'], 'namespace' => 'App\Modules\Account\Controllers'], function() {

    Route::resource('Account', 'AccountController');

});
