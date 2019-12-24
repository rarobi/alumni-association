<?php

Route::group(['module' => 'Member', 'middleware' => ['api'], 'namespace' => 'App\Modules\Member\Controllers'], function() {

    Route::resource('Member', 'MemberController');

});
