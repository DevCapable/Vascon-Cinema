<?php

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

use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->group(function () {
    Route::get('/', 'ClientController@index');
});


//Route::view('/', 'index');
// Route::get('/',[Modules\Client\Http\Controllers\ClientController::class,'index']);
// get lekki publication page
Route::get('lekkiCinema', [Modules\Client\Http\Controllers\ClientController::class, 'lekkiCinema'])->name('lekkiCinema');

// get ikeja publication page
Route::get('ikejaCinema', [Modules\Client\Http\Controllers\ClientController::class, 'ikejaCinema'])->name('ikejaCinema');

// get Ajah publication page
Route::get('ajahCinema', [Modules\Client\Http\Controllers\ClientController::class, 'ajahCinema'])->name('ajahCinema');

// get contact us page
Route::get('contactUs', [Modules\Client\Http\Controllers\ClientController::class, 'contactUs'])->name('contactUs');

// get about us page
Route::get('aboutUs', [Modules\Client\Http\Controllers\ClientController::class, 'aboutUs'])->name('aboutUs');

// read ajah Cinema
Route::get('read-ajahCinema/{id}', [Modules\Client\Http\Controllers\ClientController::class, 'readAjahCinema'])->name('read-ajahCinema');
// read ikeja Cinema
Route::get('read-ikejaCinema/{id}', [Modules\Client\Http\Controllers\ClientController::class, 'readIkejaCinema'])->name('read-ikejaCinema');

// read lekki Cinema
Route::get('read-lekkiCinema/{id}', [Modules\Client\Http\Controllers\ClientController::class, 'readLekkiCinema'])->name('read-lekkiCinema');
