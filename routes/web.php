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
Route::get('/aircall/numbers', [AircallController::class, 'numbers']);
Route::get('/aircall/teams', [AircallController::class, 'teams']);
Route::get('/aircall/tags', [AircallController::class, 'tags']);
Route::get('/aircall/company', [AircallController::class, 'tags']);