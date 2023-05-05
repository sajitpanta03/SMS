<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\teacher_subject;

class TeacherController extends Controller
{
    public function teachershow(){
        $data=Teacher::all();
    return view('teacher',['teachers'=>$data]);
    }

    public function SubjectShow()
    {
        $data = Subject::all();
        return view('AddTeacher', ['subjects' => $data]);
    }

    public function add(Request $req){
        Teacher::create([
            'name'=> $req->name,
            'address'=> $req->address,
            'phone_number'=> $req->phone,
            'email'=> $req->email,
        ]);

        $email= $req->email;
        $teacherDetail= Teacher::firstWhere('email', $email);
        $subjectids= $req->subjects_id;
        foreach($subjectids as $subjectid){

            teacher_subject::create([
                'teacher_id'=> $teacherDetail->id,
                'subject_id'=> $subjectid
            ]);

        }

        return redirect('teachers');
    }

    public function ShowTeacherAndSubject($id){
        $Teacher=Teacher::find($id);
        $subject=Subject::all();
        return view('EditTeacher',['Teacher'=>$Teacher],['subjects'=>$subject]);
    }


    public function UpdateTeacher(Request $req){
     Teacher::where('id', '=', $req->id)
	->update([
		'name'=> $req->name,
        'address'=> $req->address,
        'phone_number'=> $req->phone,
        'email'=> $req->email
	]);
    $subjectsIDs= $req->subjects_id;
    foreach($subjectsIDs as $subjectsID){

        teacher_subject::where('teacher_id', '=', $req->id)
        ->update([
            'subject_id'=> $subjectsID
        ]);

    }

    }
}
