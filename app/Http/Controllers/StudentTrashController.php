<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentTrashController extends Controller
{
    function index()
    {
        return view('studentRecycle', ['students' => Student::onlyTrashed()->get()]);
    }

    function restore($id)
    {
        Student::onlyTrashed()->find($id)->restore();
        return redirect()->route('students.trash');
    }

    function delete($id)
    {
        Student::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('students.trash');
    }
}
