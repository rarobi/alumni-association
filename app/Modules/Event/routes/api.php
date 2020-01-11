<?php

Route::group(['module' => 'Event', 'middleware' => ['api'], 'namespace' => 'App\Modules\Event\Controllers'], function() {

    Route::resource('Event', 'EventController');

});
