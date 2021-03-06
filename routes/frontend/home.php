<?php

use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\AlumniLoginController;
use App\Http\Controllers\Frontend\EducationController;
use App\Http\Controllers\Frontend\ProfessionController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about']);
Route::get('/vision', [HomeController::class, 'vision']);

Route::get('/profile/edit/{id}', [ProfileController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update/{id}', [ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile-upload', [ProfileController::class, 'profileUpload'])->name('profile.upload');

Route::post('alumni/education', [EducationController::class, 'addEducation'])->name('education.store');
Route::get('alumni/education/{id}', [EducationController::class, 'deleteEducation'])->name('education.delete');

Route::post('alumni/profession', [ProfessionController::class, 'addProfession'])->name('profession.store');
Route::get('alumni/profession/{id}', [ProfessionController::class, 'deleteProfession'])->name('profession.delete');

Route::get('/elected-members', [HomeController::class, 'electedMembers']);
Route::get('/alumni', [HomeController::class, 'members']);
Route::get('/alumni-list/{id}', [HomeController::class, 'memberList']);
Route::get('/alumni/{id}', [HomeController::class, 'memberDetails']);

Route::get('/latest-notice', [HomeController::class, 'notice']);
Route::get('/latest-notice/{id}', [HomeController::class, 'noticeDetails']);

Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog-details', [BlogController::class, 'show']);

Route::get('/news', [BlogController::class, 'newsAll']);
Route::get('/news-details', [BlogController::class, 'newsDetails']);

Route::get('/events', [BlogController::class, 'eventsAll']);
Route::get('/event-details', [BlogController::class, 'eventDetails']);

Route::get('/announcements', [BlogController::class, 'announcementAll']);
Route::get('/announcement-details', [BlogController::class, 'announcementDetails']);

Route::get('/alumni-gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/registration-rules', [HomeController::class, 'registrationRules']);

Route::get('/archive-member/2018-2018', [HomeController::class, 'archive_2018']);
Route::get('/member/search', [HomeController::class, 'memberSearch']);


Route::get('/alumni-login', [AlumniLoginController::class, 'loginForm'])->name('alumni.login');
Route::post('/alumni-login', [AlumniLoginController::class, 'login']);
Route::get('/alumni-register', [AlumniLoginController::class, 'registerForm'])->name('alumni.register');
Route::post('/alumni-register', [AlumniLoginController::class, 'register']);
//Route::get('/', [LoginController::class, 'showLoginForm'])->name('index');
//Route::post('/alumni-contact', [ContactController::class, 'store'])->name('alumni-contact.store');
Route::post('alumni-contact', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        // User Dashboard Specific
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
