<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student', ['students'=> Student::all(), 'subjects' => Subject::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        DB::transaction(function() use ($request){
            $student = Student::create($request->toArray());
            $student->subjects()->attach($request->subjects_id);
        });
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return $student;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('editStudent', ['student' => $student, 'subjects' => Subject::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, Student $student)
    {  
        DB::transaction(function() use ($request, $student){
            $student->update($request->validated());
            $student->subjects()->sync($request->subjects_id);
        });
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
