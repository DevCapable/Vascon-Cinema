<?php

 use Illuminate\Support\Facades\Route;



Route::get('/', [Modules\Client\Http\Controllers\ClientController::class, 'index'])->name('manageAjahCinema');