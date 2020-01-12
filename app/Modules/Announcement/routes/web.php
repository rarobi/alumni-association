<?php

Route::group(['module' => 'Announcement', 'middleware' => ['web'], 'namespace' => 'App\Modules\Announcement\Controllers'], function() {

    Route::resource('announcement', 'AnnouncementController');

});
