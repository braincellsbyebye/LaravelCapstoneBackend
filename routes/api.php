<?php

use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\ReqMedController;

Route::get('/students', [StudentController::class, 'index']);
Route::post('/add-student', [StudentController::class, 'store']);
Route::get('/count', [StudentController::class, 'num']);
Route::get('/edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::get('/search/{key}', [StudentController::class, 'search']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);

Route::get('/doctors', [DoctorController::class, 'index']);
Route::post('/add-doctor', [DoctorController::class, 'store']);
Route::get('/edit-doctor/{id}', [DoctorController::class, 'edit']);
Route::put('update-doctor/{id}', [DoctorController::class, 'update']);
Route::delete('delete-doctor/{id}', [DoctorController::class, 'destroy']);


Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);

Route::post('mregister',[UserAccountController::class, 'register']);
Route::post('mlogin',[UserAccountController::class, 'login']);
Route::get('/useraccdetails', [UserAccountController::class, 'index']);

Route::get('/appointment', [AppointmentController::class, 'index']);
Route::get('/dentalappointment', [AppointmentController::class, 'dental']);
Route::post('/addapt', [AppointmentController::class, 'store']);

Route::get('/medcert', [ReqMedController::class, 'index']);
Route::post('/reqmed', [ReqMedController::class, 'store']);
Route::get('/edit-medcert/{id}', [ReqMedController::class, 'edit']);
Route::put('update-medcert/{id}', [ReqMedController::class, 'update']);
Route::get('/medi/{id}', [ReqMedController::class, 'find']);
Route::delete('delete-medcert/{id}', [ReqMedController::class, 'destroy']);