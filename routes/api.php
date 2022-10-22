<?php

use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;

Route::get('/students', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'store']);
Route::get('/edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);

Route::get('/doctors', [DoctorController::class, 'index']);
Route::post('/add-doctor', [DoctorController::class, 'store']);
Route::get('/edit-doctor/{id}', [DoctorController::class, 'edit']);
Route::put('update-doctor/{id}', [DoctorController::class, 'update']);
Route::delete('delete-doctor/{id}', [DoctorController::class, 'destroy']);


Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);

Route::get('/appointment', [AppointmentController::class, 'index']);
Route::get('/dentalappointment', [AppointmentController::class, 'dental']);
Route::post('/addapt', [AppointmentController::class, 'store']);