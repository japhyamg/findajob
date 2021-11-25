<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Users\JobController;
use App\Http\Controllers\Users\HomeController;
use App\Http\Controllers\Users\ResumeController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\InterviewController;

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
Route::get('/about-us', [PagesController::class, 'aboutus'])->name('about-us');
Route::get('/terms', [PagesController::class, 'terms'])->name('terms');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
Route::get('/pricing-plans', [PagesController::class, 'pricingplans'])->name('pricing-plans');
Route::get('/nysc', [PagesController::class, 'nysc'])->name('nysc');
Route::get('/job-search', [PagesController::class, 'jobsearch'])->name('job-search');
Route::get('/self-employed', [PagesController::class, 'selfemployed'])->name('self-employed');
Route::get('/employers', [PagesController::class, 'employers'])->name('employers');
Route::get('/job-seekers', [PagesController::class, 'jobseekers'])->name('job-seekers');
Route::get('/loop-vc', [PagesController::class, 'loopvc'])->name('loop-vc');
Route::get('/ayeen', [PagesController::class, 'ayeen'])->name('ayeen');
Route::get('/nde', [PagesController::class, 'nde'])->name('nde');
Route::get('/cv-creator', [PagesController::class, 'cvcreator'])->name('cv-creator');
Route::get('/job-centers', [PagesController::class, 'jobcenters'])->name('job-centers');
Route::get('/job-seeker-videos', [PagesController::class, 'jobseekervideos'])->name('job-seeker-videos');

Route::get('/faqs', [PagesController::class, 'faqs'])->name('faqs');
Route::get('/help', [PagesController::class, 'help'])->name('help');
Route::get('/contact-us', [PagesController::class, 'contactus'])->name('contact-us');

Route::get('/foo-storage', function () {
    Artisan::call('storage:link');
});




Auth::routes(['verify' => true]);
Route::middleware(['auth', 'verified'])->name('user.')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');



    // Find a job
    Route::get('/job/find', [JobController::class, 'index'])->name('find');
    Route::get('/job/fetch/{slug}', [JobController::class, 'fetchjob'])->name('fetchjob');

    Route::post('/job/apply/{slug}', [JobController::class, 'apply'])->name('apply');
    Route::post('/job/save/{slug}', [JobController::class, 'save'])->name('save');

    Route::get('/job/saved', [JobController::class, 'savedjobs'])->name('savedjobs');
    Route::get('/job/applications', [JobController::class, 'applications'])->name('applications');

    // Upload Resume
    Route::get('/upload-cv', [ResumeController::class, 'index'] )->name('upload-cv');
    Route::post('/upload-cv', [ResumeController::class, 'storecv'] )->name('upload-cv');
    Route::delete('/delete-cv', [ResumeController::class, 'deletecv'] )->name('delete-cv');

    // Interviews
    Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews');


    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'updateprofile'])->name('update-profile');


    Route::post('/add-education', [ProfileController::class, 'addeducation'])->name('add-education');
    Route::delete('/delete-education', [ProfileController::class, 'deleteeducation'])->name('delete-education');
    Route::post('/add-employment-history', [ProfileController::class, 'addemploymenthistory'])->name('add-employment-history');
    Route::delete('/delete-employment-history', [ProfileController::class, 'deleteemploymenthistory'])->name('delete-employment-history');
    Route::post('/add-certificate', [ProfileController::class, 'addcertificate'])->name('add-certificate');
    Route::delete('/delete-certificate', [ProfileController::class, 'deletecertificate'])->name('delete-certificate');
    Route::post('/add-skill', [ProfileController::class, 'addskill'])->name('add-skill');
    Route::delete('/delete-skill', [ProfileController::class, 'deleteskill'])->name('delete-skill');

    // Update password
    Route::post('/update-password', [ProfileController::class, 'updatepassword'])->name('update-password');

});

Route::prefix('employer')->name('employer.')->group(base_path('routes/employer.php'));
Route::prefix('admin')->name('admin.')->group(base_path('routes/admin.php'));

