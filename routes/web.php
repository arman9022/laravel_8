<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\ProfileController;
Route::resource('profile', ProfileController::class);

use App\Http\Controllers\EmployeeController;
Route::resource('employee', EmployeeController::class);