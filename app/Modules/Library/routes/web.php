<?php

Route::group(['module' => 'Library', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Library\Controllers'], function() {

//    Route::resource('library', 'LibraryController');
    Route::post('library/book/auto-suggest', 'LibraryController@bookAutoSuggest');
    Route::post('library/book/add-cart', 'LibraryController@bookAddCart')->name('library.book.add.cart');
    Route::post('library/book/cart/edit-delete', 'LibraryController@bookCartEditDelete')->name('library.book.cart.editDelete');

    Route::resource('library/book/entry', 'BookEntryController', ['names' => [
        'index'     => 'library.book.entry.index',
        'create'    => 'library.book.entry.create',
        'store'     => 'library.book.entry.store',
        'show'      => 'library.book.entry.show',
        'edit'      => 'library.book.entry.edit',
        'update'    => 'library.book.entry.update',
        'destroy'   => 'library.book.entry.destroy'
    ]]);

    Route::resource('library/book/issue', 'BookIssueController', ['names' => [
        'index'     => 'library.book.issue.index',
        'create'    => 'library.book.issue.create',
        'store'     => 'library.book.issue.store',
        'show'      => 'library.book.issue.show'
    ]]);

    Route::resource('library/book/return', 'BookReturnController', ['names' => [
        'index'     => 'library.book.return.index',
        'update'    => 'library.book.return.update',
    ]]);

    Route::resource('library/book/distributed', 'BookDistributedController', ['names' => [
        'index'     => 'library.book.distributed.index'
    ]]);

    Route::resource('library/book/member-history', 'BookHistoryController', ['names' => [
        'index'     => 'library.book.member.history'
    ]]);

});
