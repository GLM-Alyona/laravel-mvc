<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GroupStudentController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('groups', GroupController::class);
Route::resource('students', StudentController::class);
Route::resource('groups.students', GroupStudentController::class);