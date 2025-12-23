<?php

use Illuminate\Support\Facades\Route;

// This ensures http://127.0.0.1:8000/ LOADS the Role Picker
Route::get('/', function () {
    return view('welcome');
})->name('home');