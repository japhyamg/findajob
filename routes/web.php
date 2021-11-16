<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\JobController;
use App\Http\Controllers\Users\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/get-started', [PagesController::class, 'getstarted'])->name('get-started');
Route::get('/show', [PagesController::class, 'show'])->name('show');

// Route::get('/contact-us', [PagesController::class, 'contactus'])->name('contact-us');
Route::get('/contact-us', [PagesController::class, 'contactus'])->name('contact-us');





Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->name('user.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');



    // User Dashboard Find a job
    Route::get('/job/find', [JobController::class, 'index'])->name('find');
    Route::get('/job/fetch/{slug}', [JobController::class, 'fetchjob'])->name('fetchjob');

    Route::post('/job/apply/{slug}', [JobController::class, 'apply'])->name('apply');
    Route::post('/job/save/{slug}', [JobController::class, 'save'])->name('save');

    Route::get('/job/saved', [JobController::class, 'savedjobs'])->name('savedjobs');



    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'updateprofile'])->name('update-profile');

    Route::post('/add-education', [ProfileController::class, 'addeducation'])->name('add-education');
    Route::post('/add-employment-history', [ProfileController::class, 'addemploymenthistory'])->name('add-employment-history');
    Route::post('/add-certificate', [ProfileController::class, 'addcertificate'])->name('add-certificate');
    Route::post('/add-skill', [ProfileController::class, 'addskill'])->name('add-skill');

});

Route::prefix('employer')->name('employer.')->group(base_path('routes/employer.php'));
Route::prefix('admin')->name('admin.')->group(base_path('routes/admin.php'));

