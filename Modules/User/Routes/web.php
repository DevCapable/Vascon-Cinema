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
use Modules\User\Http\Controllers\AdminController as adminController;

Route::prefix('administrator')->group(function () {
    Route::get('/', 'UserController@index');


    //admin home
    Route::post('adminHome', [adminController::class, 'adminHome'])->name('adminHome');


    //manage ajah
    Route::get('manageAjahCinema', [adminController::class, 'manageAjahCinema'])->name('manageAjahCinema');
    //manage IkejaCinema
    Route::get('manageIkejaCinema', [adminController::class, 'manageIkejaCinema'])->name('manageIkejaCinema');
    //manage LekkiCinema
    Route::get('manageLekkiCinema', [adminController::class, 'manageLekkiCinema'])->name('manageLekkiCinema');
    // create AjahCinema Publication
    Route::post('administratorCreateAjahCinema', [adminController::class, 'createAjahCinema'])->name('createAjahCinema');
    // create IkejaCinema Publication
    Route::post('administratorCreateIkejaCinema', [adminController::class, 'createIkejaCinema'])->name('createIkejaCinema');
    // create LekkiCinema Publication
    Route::post('administratorCreateLekkiCinema', [adminController::class, 'createLekkiCinema'])->name('createLekkiCinema');

    // publish or unpublish AjahCinema content
    Route::get('actionOnAjahCinema/{id}', [adminController::class, 'actionOnAjahCinema'])->name('actionOnAjahCinema');
    // publish or unpublish IkejaCinema content
    Route::get('actionOnIkejaCinema/{id}', [adminController::class, 'actionOnIkejaCinema'])->name('actionOnIkejaCinema');
    // publish or unpublish LekkiCinema content
    Route::get('actionOnLekkiCinema/{id}', [adminController::class, 'actionOnLekkiCinema'])->name('actionOnLekkiCinema');
    //Edit AjahCinema content
    Route::get('editAjahCinema/{id}', [adminController::class, 'editAjahCinema'])->name('editAjahCinema');

    // chage AjahCinema Movie
    Route::post('changeAjahCinemaMovie', [adminController::class, 'changeAjahCinemaMovie'])->name('changeAjahCinemaMovie');
    // Update AjahCinema
    Route::post('updateAjahCinema', [adminController::class, 'updateAjahCinema'])->name('updateAjahCinema');
    // delete AjahCinema Content
    Route::get('deleteAjahCinema/{id}', [adminController::class, 'deleteAjahCinema'])->name('deleteAjahCinema');

    //Edit IkejaCinema content
    Route::get('editIkejaCinema/{id}', [adminController::class, 'editIkejaCinema'])->name('editIkejaCinema');
    // chage IkejaCinema Movie
    Route::post('changeIkejaCinemaMovie', [adminController::class, 'changeIkejaCinemaMovie'])->name('changeIkejaCinemaMovie');
    // Update IkejaCinema
    Route::post('updateIkejaCinema', [adminController::class, 'updateIkejaCinema'])->name('updateIkejaCinema');
    // delete IkejaCinema Content
    Route::get('deleteIkejaCinema/{id}', [adminController::class, 'deleteIkejaCinema'])->name('deleteIkejaCinema');

    //Edit LekkiCinema content
    Route::get('editLekkiCinema/{id}', [adminController::class, 'editLekkiCinema'])->name('editLekkiCinema');
    // chage LekkiCinema Movie
    Route::post('changeLekkiCinemaMovie', [adminController::class, 'changeLekkiCinemaMovie'])->name('changeLekkiCinemaMovie');
    // Update LekkiCinema
    Route::post('updateLekkiCinema', [adminController::class, 'updateLekkiCinema'])->name('updateLekkiCinema');
    // delete LekkiCinema Content
    Route::get('deleteLekkiCinema/{id}', [adminController::class, 'deleteLekkiCinema'])->name('deleteLekkiCinema');

    # admin log out
    Route::post('admin/logout', [adminController::class, 'logout']);

});

