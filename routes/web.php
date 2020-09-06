<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('registrationForm','registration');
Route::post('studentRegistration', [\App\Http\Controllers\StudentController::class, 'studentRegistration']);
Route::get('studentList', [\App\Http\Controllers\StudentController::class, 'studentList']);
Route::view('examForm', 'exams');
Route::post('addExam',[\App\Http\Controllers\StudentController::class,'addExams']);