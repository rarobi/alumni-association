<?php

Route::group(['module' => 'Settings', 'middleware' => ['web'], 'namespace' => 'App\Modules\Settings\Controllers'], function() {

    Route::resource('settings', 'SettingsController');

    Route::resource('settings/books/category', 'BookCategoryController', ['names' => [
        'index'     => 'settings.book.category.index',
        'create'    => 'settings.book.category.create',
        'store'     => 'settings.book.category.store',
        'show'      => 'settings.book.category.show',
        'edit'      => 'settings.book.category.edit',
        'update'    => 'settings.book.category.update',
        'destroy'   => 'settings.book.category.destroy'
    ]]);

    Route::resource('settings/books/writers', 'BookWriterController', ['names' => [
        'index'     => 'settings.book.writers.index',
        'create'    => 'settings.book.writers.create',
        'store'     => 'settings.book.writers.store',
        'show'      => 'settings.book.writers.show',
        'edit'      => 'settings.book.writers.edit',
        'update'    => 'settings.book.writers.update',
        'destroy'   => 'settings.book.writers.destroy'
    ]]);

    Route::resource('settings/books/publisher', 'BookPublisherController', ['names' => [
        'index'     => 'settings.book.publisher.index',
        'create'    => 'settings.book.publisher.create',
        'store'     => 'settings.book.publisher.store',
        'show'      => 'settings.book.publisher.show',
        'edit'      => 'settings.book.publisher.edit',
        'update'    => 'settings.book.publisher.update',
        'destroy'   => 'settings.book.publisher.destroy'
    ]]);
});
