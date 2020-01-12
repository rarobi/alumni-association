<?php

Route::group(['module' => 'Certification', 'middleware' => ['api'], 'namespace' => 'App\Modules\Certification\Controllers'], function() {

    Route::resource('Certification', 'CertificationController');

});
