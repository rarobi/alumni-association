<?php

use App\Http\Controllers\Backend\Auth\User\UserConfirmationController;
use App\Http\Controllers\Backend\Auth\User\UserPasswordController;
use App\Http\Controllers\Backend\Auth\User\UserStatusController;
use App\Modules\Member\Controllers\MemberPasswordController;
use App\Http\Controllers\Backend\Auth\Role\RoleController;

Route::group(['module' => 'Member', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Member\Controllers'], function() {

    Route::get('member/auto-suggest', [RoleController::class, 'memberAutoSuggest'])->name('member.auto-suggest');

    Route::get('member/pending_list', 'MemberController@pendingList')->name('member.pending-list');
    Route::get('member/review_list', 'MemberController@reviewList')->name('member.review-list');

//    Route::resource('member', 'MemberController');
    Route::resource('member', 'MemberController', ['names' => [
        'index'     => 'member.index',
        'create'    => 'member.create',
        'store'     => 'member.store',
        'show'      => 'member.show',
        'edit'      => 'member.edit',
        'update'    => 'member.update',
        'destroy'   => 'member.destroy'
    ]]);

    Route::get('member/accept/{id}', 'MemberController@acceptMember')->name('member.accept');

    Route::post('member/log-in-out', 'MemberController@loggedInOut')->name('member.log-in-out');


//    // User Status'
//    Route::get('user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('user.deactivated');
//    Route::get('user/deleted', [UserStatusController::class, 'getDeleted'])->name('user.deleted');
//
//    // Confirmation
//    Route::get('confirm', [UserConfirmationController::class, 'confirm'])->name('member.confirm');
//    Route::get('unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('member.unconfirm');

    // Password
    Route::get('password/change', [MemberPasswordController::class, 'edit'])->name('member.change-password');
    Route::patch('password/change', [MemberPasswordController::class, 'update'])->name('member.change-password.post');

    // Deleted
//    Route::get('delete', [UserStatusController::class, 'delete'])->name('member.delete-permanently');
//    Route::get('restore', [UserStatusController::class, 'restore'])->name('member.restore');


});
