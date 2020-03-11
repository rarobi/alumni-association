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


    Route::resource('settings/alumni/archive', 'archiveController', ['names' => [
        'index'     => 'settings.alumni.archive.index',
        'create'    => 'settings.alumni.archive.create',
        'store'     => 'settings.alumni.archive.store',
        'show'      => 'settings.alumni.archive.show',
        'edit'      => 'settings.alumni.archive.edit',
        'update'    => 'settings.alumni.archive.update',
        'destroy'   => 'settings.alumni.archive.destroy'
    ]]);

    Route::get('settings/alumni/change-password', 'SettingsController@index')->name('settings.alumni.change-password');
    Route::post('settings/alumni/change-password', 'SettingsController@store')->name('settings.alumni.change-password.store');

    Route::get('settings/alumni/batch-admin-email', 'SettingsController@batchAdminEmail')->name('settings.alumni.batch-admin-email');
    Route::post('settings/alumni/batch-admin-email', 'SettingsController@addBatchAdminEmail')->name('settings.alumni.add-email');
    Route::post('settings/alumni/batch-admin-email/{id}', 'SettingsController@deleteBatchAdminEmail')->name('settings.alumni.delete-email');


});
