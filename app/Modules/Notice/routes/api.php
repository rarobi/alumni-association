<?php

Route::group(['module' => 'Notice', 'middleware' => ['api'], 'namespace' => 'App\Modules\Notice\Controllers'], function() {

    Route::resource('Notice', 'NoticeController');

});
