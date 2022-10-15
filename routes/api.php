<?php

use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;

Route::get('/students', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'store']);
Route::get('/edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);

Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);

Route::get('/appointment', [AppointmentController::class, 'index']);
Route::post('/addapt', [AppointmentController::class, 'store']);