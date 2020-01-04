<?php

use App\Http\Controllers\Frontend\User\ProfileController;

Route::group(['module' => 'Dashboard', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Dashboard\Controllers'], function() {

    Route::resource('dashboard', 'DashboardController');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

});
