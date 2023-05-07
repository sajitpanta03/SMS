<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function show()
    {
        $data = Teacher::all();
        // dd($data);
        return view('teacher', ['teachers'=>$data]);
    }
}
