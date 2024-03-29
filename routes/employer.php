<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employers\JobController;
use App\Http\Controllers\Employers\HomeController;
use App\Http\Controllers\Employers\SearchController;
use App\Http\Controllers\Employers\MessageController;
use App\Http\Controllers\Employers\Auth\LoginController;
use App\Http\Controllers\Employers\ApplicationController;
use App\Http\Controllers\Employers\Auth\RegisterController;
use App\Http\Controllers\Employers\EmployerDetailsController;
use App\Http\Controllers\Employers\Auth\VerificationController;
use App\Http\Controllers\Employers\Auth\ResetPasswordController;
use App\Http\Controllers\Employers\Auth\ForgotPasswordController;

Route::middleware(['auth:employer', 'verified:employer.verification.notice'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    // Post Job
    Route::get('/post-job', [JobController::class, 'create'])->name('post-job');
    Route::post('/post-job', [JobController::class, 'store'])->name('post-job');

    Route::get('/manage-jobs', [JobController::class, 'index'])->name('manage-jobs');
    Route::get('/applications', [ApplicationController::class, 'index'])->name('applications');
    Route::post('/application/fetch', [ApplicationController::class, 'fetch'])->name('fetchapplication');
    Route::post('/application/shortlist', [ApplicationController::class, 'shortlist'])->name('shortlistapplicant');
    Route::get('/applications/shortlisted', [ApplicationController::class, 'shortlisted'])->name('shortlistedapplications');

    //Search
    Route::get('/search', [SearchController::class, 'index'])->name('search');

    //Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages');

    // Company Profile
    Route::get('/company-details', [EmployerDetailsController::class, 'index'])->name('company-details');
    Route::post('/update-company-details', [EmployerDetailsController::class, 'updatecompanydetails'])->name('update-company-details');
    Route::post('/profile/upload',[EmployerDetailsController::class, 'upload'])->name('profile-upload');

    // Contact Person
    Route::get('/contact-person', [EmployerDetailsController::class, 'contactperson'])->name('contact-person');
    Route::post('/update-contact-person', [EmployerDetailsController::class, 'updatecontactperson'])->name('update-contact-person');
    // Update Password
    Route::post('/update-password', [EmployerDetailsController::class, 'updatepassword'])->name('update-password');

});



//Login Routes
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

//Register Routes
Route::get('/register',[RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class, 'register'])->name('register');

//Forgot Password Routes
Route::get('/password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//Reset Password Routes
Route::get('/password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

//Email Verification Routes
Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
