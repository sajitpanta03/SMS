<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('dashboard');
});

Route::get('/students', function(){
    return view('student');
});

// Subject Route
Route::get('subjects', [SubjectController::class, 'show']);
Route::get('DeleteSubject/{id}', [SubjectController::class, 'delete']);
Route::get('EditSubject/{id}', [SubjectController::class, 'ShowData']);
Route::post('EditSubject/{id}', [SubjectController::class, 'edit']);
Route::get('/AddSubject', function(){
    return view('AddSubject');
});
Route::post('add', [SubjectController::class, 'add']);

//
