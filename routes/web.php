<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\userController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentTrashController;
use App\Http\Controllers\UserTrashController;
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


Route::group(['middleware' => 'logoutCheck'], function () {
    // Login route
    Route::get('/login', [LoginController::class, 'index']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});


Route::group(['middleware' => 'loginCheck'], function () {
    // Dashboard route 
    Route::get('/', [DashboardController::class, 'index']);

    // User route 
    Route::group(['prefix' => 'users'], function(){
        Route::get('/trash', [UserTrashController::class, 'index'])->name('users.trash');
        Route::get('/restore/{id}', [UserTrashController::class, 'restore'])->name('users.restore');
        Route::get('/delete/{id}', [UserTrashController::class, 'delete'])->name('users.delete');
    });
    Route::resource('users', userController::class);
    

    // Student route 
    Route::group(['prefix' => 'students'], function(){
        Route::get('/trash', [StudentTrashController::class, 'index'])->name('students.trash');
        Route::get('/restore/{id}', [StudentTrashController::class, 'restore'])->name('students.restore');
        Route::get('/delete/{id}', [StudentTrashController::class, 'delete'])->name('students.delete');
    });
    Route::resource('students', StudentController::class);

    // Subject Route
    Route::get('subjects', [SubjectController::class, 'show']);
    Route::get('DeleteSubject/{id}', [SubjectController::class, 'delete']);
    Route::get('EditSubject/{id}', [SubjectController::class, 'ShowData']);
    Route::post('EditSubject/{id}', [SubjectController::class, 'edit']);
    Route::get('/AddSubject', function () {
        return view('AddSubject');
    });
    Route::post('add', [SubjectController::class, 'add']);

    // Logout route
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

   // Teacher Route
   Route::get('teachers',[TeacherController::class,'teachershow']);
   Route::get('AddTeacher',[TeacherController::class,'SubjectShow']);
   Route::post('addTeacher',[TeacherController::class,'add']);
   Route::get('EditTeacher/{id}',[TeacherController::class,'ShowTeacherAndSubject']);
   Route::post('EditTeacher/{id}',[TeacherController::class,'UpdateTeacher']);
   Route::get('DeleteTeacher/{id}',[TeacherController::class,'Delete']);

   // Mark routes
   Route::get('mark', [MarkController::class,'Show']);
   Route::get('/mark/search', [MarkController::class,'search'])->name('mark.search');
   Route::get('selectMark/{id}', [MarkController::class, 'edit'])->name('selectMark');
   Route::post('selectMark/markadd', [MarkController::class, 'markAdd'])->name('mark.add');
});
