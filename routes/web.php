<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\userController;
use App\Http\Controllers\SubjectController;
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

Route::resource('users', userController::class);
Route::resource('students', StudentController::class);

// Subject Route
Route::get('subjects', [SubjectController::class, 'show']);
Route::get('DeleteSubject/{id}', [SubjectController::class, 'delete']);
Route::get('EditSubject/{id}', [SubjectController::class, 'ShowData']);
Route::post('EditSubject/{id}', [SubjectController::class, 'edit']);
Route::get('/AddSubject', function(){
    return view('AddSubject');
});
Route::post('add', [SubjectController::class, 'add']);