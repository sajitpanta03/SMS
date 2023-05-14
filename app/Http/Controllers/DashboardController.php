<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
        session()->put('active', 'dashboard');
        return view('dashboard', [
            'users_count' => User::count(),
            'teachers_count' => Teacher::count(),
            'students_count' => Student::count()
        ]);
    }
}
