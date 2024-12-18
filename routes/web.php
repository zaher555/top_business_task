<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('employees', EmployeeController::class);
