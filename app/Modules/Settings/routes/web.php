<?php

Route::group(['module' => 'Settings', 'middleware' => ['web'], 'namespace' => 'App\Modules\Settings\Controllers'], function() {

    Route::resource('settings', 'SettingsController');

    Route::resource('settings/alumni/batch', 'BatchController', ['names' => [
        'index'     => 'settings.alumni.batch.index',
        'create'    => 'settings.alumni.batch.create',
        'store'     => 'settings.alumni.batch.store',
        'show'      => 'settings.alumni.batch.show',
        'edit'      => 'settings.alumni.batch.edit',
        'update'    => 'settings.alumni.batch.update',
        'destroy'   => 'settings.alumni.batch.destroy'
    ]]);

    Route::resource('settings/alumni/session', 'SessionController', ['names' => [
        'index'     => 'settings.alumni.session.index',
        'create'    => 'settings.alumni.session.create',
        'store'     => 'settings.alumni.session.store',
        'show'      => 'settings.alumni.session.show',
        'edit'      => 'settings.alumni.session.edit',
        'update'    => 'settings.alumni.session.update',
        'destroy'   => 'settings.alumni.session.destroy'
    ]]);

});
