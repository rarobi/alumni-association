<?php

Route::group(['module' => 'Library', 'middleware' => ['api'], 'namespace' => 'App\Modules\Library\Controllers'], function() {

    Route::resource('Library', 'LibraryController');

});
