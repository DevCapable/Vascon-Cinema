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

Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
});


//admin home
Route::post('adminHome', [Modules\User\Http\Controllers\AdminController::class, 'adminHome'])->name('adminHome');



//manage ajah
Route::get('manageAjahCinema', [Modules\User\Http\Controllers\AdminController::class, 'manageAjahCinema'])->name('manageAjahCinema');
//manage IkejaCinema
Route::get('manageIkejaCinema', [Modules\User\Http\Controllers\AdminController::class, 'manageIkejaCinema'])->name('manageIkejaCinema');
//manage LekkiCinema
Route::get('manageLekkiCinema', [Modules\User\Http\Controllers\AdminController::class, 'manageLekkiCinema'])->name('manageLekkiCinema');
// create AjahCinema Publication
Route::post('administratorCreateAjahCinema', [Modules\User\Http\Controllers\AdminController::class, 'createAjahCinema'])->name('createAjahCinema');
// create IkejaCinema Publication
Route::post('administratorCreateIkejaCinema', [Modules\User\Http\Controllers\AdminController::class, 'createIkejaCinema'])->name('createIkejaCinema');
// create LekkiCinema Publication
Route::post('administratorCreateLekkiCinema', [Modules\User\Http\Controllers\AdminController::class, 'createLekkiCinema'])->name('createLekkiCinema');

// publish or unpublish AjahCinema content
Route::get('actionOnAjahCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'actionOnAjahCinema'])->name('actionOnAjahCinema');
// publish or unpublish IkejaCinema content
Route::get('actionOnIkejaCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'actionOnIkejaCinema'])->name('actionOnIkejaCinema');
// publish or unpublish LekkiCinema content
Route::get('actionOnLekkiCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'actionOnLekkiCinema'])->name('actionOnLekkiCinema');
//Edit AjahCinema content
Route::get('editAjahCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'editAjahCinema'])->name('editAjahCinema');

// chage AjahCinema Movie 
Route::post('changeAjahCinemaMovie', [Modules\User\Http\Controllers\AdminController::class, 'changeAjahCinemaMovie'])->name('changeAjahCinemaMovie');
// Update AjahCinema
Route::post('updateAjahCinema', [Modules\User\Http\Controllers\AdminController::class, 'updateAjahCinema'])->name('updateAjahCinema');
// delete AjahCinema Content
Route::get('deleteAjahCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'deleteAjahCinema'])->name('deleteAjahCinema');

//Edit IkejaCinema content
Route::get('editIkejaCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'editIkejaCinema'])->name('editIkejaCinema');
// chage IkejaCinema Movie 
Route::post('changeIkejaCinemaMovie', [Modules\User\Http\Controllers\AdminController::class, 'changeIkejaCinemaMovie'])->name('changeIkejaCinemaMovie');
// Update IkejaCinema
Route::post('updateIkejaCinema', [Modules\User\Http\Controllers\AdminController::class, 'updateIkejaCinema'])->name('updateIkejaCinema');
// delete IkejaCinema Content
Route::get('deleteIkejaCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'deleteIkejaCinema'])->name('deleteIkejaCinema');

//Edit LekkiCinema content
Route::get('editLekkiCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'editLekkiCinema'])->name('editLekkiCinema');
// chage LekkiCinema Movie 
Route::post('changeLekkiCinemaMovie', [Modules\User\Http\Controllers\AdminController::class, 'changeLekkiCinemaMovie'])->name('changeLekkiCinemaMovie');
// Update LekkiCinema
Route::post('updateLekkiCinema', [Modules\User\Http\Controllers\AdminController::class, 'updateLekkiCinema'])->name('updateLekkiCinema');
// delete LekkiCinema Content
Route::get('deleteLekkiCinema/{id}', [Modules\User\Http\Controllers\AdminController::class, 'deleteLekkiCinema'])->name('deleteLekkiCinema');

 # admin log out
 Route::post('admin/logout', [Modules\User\Http\Controllers\AdminController::class, 'logout']);