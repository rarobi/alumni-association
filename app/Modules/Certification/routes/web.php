<?php

Route::group(['module' => 'Certification', 'middleware' => ['web'], 'namespace' => 'App\Modules\Certification\Controllers'], function() {

    Route::resource('certification', 'CertificationController');

});
