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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('test');
//Route::get('/officer_landing_page', [App\Http\Controllers\Officer\LandingController::class, 'index'])->name('officer_landing_page');
//Route::get('book_suspect', [App\Http\Controllers\DetainedController::class, 'index'])->name('book');
//Route::post('insert', [App\Http\Controllers\DetainedController::class, 'insert'])->name('insert');
Route::get('/book', [App\Http\Controllers\DetainedController::class, 'index'])->name('book');




// officer protected routes
Route::group(['middleware' => ['auth', 'officer'], 'prefix' => 'officer'], function () {
    Route::get('/officer_landing_page', [App\Http\Controllers\Officer\LandingController::class, 'index'])->name('officer_landing_page');
    Route::get('/book_suspect', [App\Http\Controllers\SuspectController::class, 'index'])->name('book_suspect');
    Route::post('insert', [App\Http\Controllers\SuspectController::class, 'insert'])->name('insert');
    Route::get('/view_suspect', [App\Http\Controllers\SuspectController::class, 'view'])->name('view_suspect');
});

// ocs protected routes
Route::group(['middleware' => ['auth', 'ocs'], 'prefix' => 'ocs'], function () {
    Route::get('/ocs_landing_page', [App\Http\Controllers\Ocs\LandingController::class, 'index'])->name('ocs_landing_page');
});

