<?php

Route::group(['module' => 'Notice', 'middleware' => ['web'], 'namespace' => 'App\Modules\Notice\Controllers'], function() {

    Route::resource('notice', 'NoticeController');

});
