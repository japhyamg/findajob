<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\ManageAdminController;
use App\Http\Controllers\Admin\ManageEmployerController;
use App\Http\Controllers\Admin\ManageIndustryController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;

// Auth:admin Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');


    // Manage Users
    // Manage Employers
    Route::get('manage-employer', [ManageEmployerController::class, 'index'])->name('manage-employer');
    // Manage Job seekers
    Route::get('manage-user', [ManageUserController::class, 'index'])->name('manage-user');
    // Manage Job seekers
    Route::get('manage-admin', [ManageAdminController::class, 'index'])->name('manage-admin');



    // Manage Industry
    Route::get('manage-industry', [ManageIndustryController::class, 'index'])->name('manage-industry');
    Route::post('store-industry', [ManageIndustryController::class, 'store'])->name('store-industry');
    Route::post('update-industry', [ManageIndustryController::class, 'update'])->name('update-industry');
    Route::delete('delete-industry', [ManageIndustryController::class, 'delete'])->name('delete-industry');
});

//Login Routes
Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// //Forgot Password Routes
Route::get('/password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// //Reset Password Routes
Route::get('/password/reset/{token}',[ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
