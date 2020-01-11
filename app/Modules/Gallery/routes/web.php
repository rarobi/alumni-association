<?php

Route::group(['module' => 'Gallery', 'middleware' => ['web'], 'namespace' => 'App\Modules\Gallery\Controllers'], function() {

    Route::resource('gallery', 'GalleryController');

});
