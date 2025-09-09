<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/aircall.php';

Route::get('/', function () {
    return view('welcome');
});
