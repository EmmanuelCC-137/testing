<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AircallBasicController;
use App\Http\Controllers\AircallController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aircall/test', [AircallBasicController::class, 'test']);

Route::get('/aircall/users', [AircallController::class, 'users']);
Route::get('/aircall/calls', [AircallController::class, 'calls']);
Route::get('/aircall/contacts', [AircallController::class, 'contacts']);