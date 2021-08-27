<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth\login');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/registrar_landing_page', [App\Http\Controllers\Registrar\LandingController::class, 'index'])->name('landing_page');
//Route::get('/court_clerk_landing_page', [App\Http\Controllers\Court_clerk\LandingController::class, 'index'])->name('court_clerk');
//Route::get('/ocs_landing_page', [App\Http\Controllers\Ocs\LandingController::class, 'index'])->name('ocs_landing_page');
//Route::get('/ocs', [App\Http\Controllers\Ocs\LandingController::class, 'new'])->name('ocs');
//Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('test');
//Route::get('/officer_landing_page', [App\Http\Controllers\Officer\LandingController::class, 'index'])->name('officer_landing_page');
Route::get('/officer_landing_page', [App\Http\Controllers\Officer\LandingController::class, 'index'])->name('book');
//Route::post('insert', [App\Http\Controllers\DetainedController::class, 'insert'])->name('insert');
//Route::get('/edit', [App\Http\Controllers\SuspectController::class, 'edit'])->name('edit');

// officer protected routes
Route::group(['middleware' => ['auth', 'officer'], 'prefix' => 'officer'], function () {
    Route::get('/officer_landing_page', [App\Http\Controllers\Officer\LandingController::class, 'index'])->name('officer_landing_page');
    Route::get('/book_suspect', [App\Http\Controllers\SuspectController::class, 'index'])->name('book_suspect');
    Route::post('insert', [App\Http\Controllers\SuspectController::class, 'insert'])->name('insert');
    Route::get('/view_suspect', [App\Http\Controllers\SuspectController::class, 'view'])->name('view_suspect');
    Route::get('/view_profile', [App\Http\Controllers\Officer\LandingController::class, 'profile'])->name('view_profile');
    Route::get('/search', [App\Http\Controllers\Officer\LandingController::class, 'search'])->name('search');
});

// ocs protected routes
Route::group(['middleware' => ['auth', 'ocs'], 'prefix' => 'ocs'], function () {
    Route::get('/ocs_landing_page', [App\Http\Controllers\Ocs\LandingController::class, 'index'])->name('ocs_landing_page');
    Route::get('/create_officer', [App\Http\Controllers\Ocs\LandingController::class, 'create'])->name('create_officer');
    Route::get('/view_officer', [App\Http\Controllers\Ocs\LandingController::class, 'view'])->name('view_officer');
});

// registrar protected routes
Route::group(['middleware' => ['auth', 'registrar'], 'prefix' => 'registrar'], function () {
    Route::get('/registrar_landing_page', [App\Http\Controllers\Registrar\LandingController::class, 'index'])->name('registrar_landing_page');
    
});

// court clerk protected routes
Route::group(['middleware' => ['auth', 'court_clerk'], 'prefix' => 'court_clerk'], function () {
    Route::get('/court_clerk_landing_page', [App\Http\Controllers\Court_clerk\LandingController::class, 'index'])->name('court_clerk_landing_page');
    
});





