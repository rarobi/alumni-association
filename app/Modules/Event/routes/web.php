<?php

Route::group(['module' => 'Event', 'middleware' => ['web'], 'namespace' => 'App\Modules\Event\Controllers'], function() {

    Route::resource('event', 'EventController');

});
