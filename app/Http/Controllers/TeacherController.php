<?php

namespace App\Http\Controllers;

use App\Jobs\MyJob;
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
        $teacher=Teacher::create([
            'name'=> $req->name,
            'address'=> $req->address,
            'phone_number'=> $req->phone,
            'email'=> $req->email,
        ]);
        // dispatch('MyJob');
        MyJob::dispatch();
       
        $subjects=$req->subjects_id;
        // foreach($subjects as $subject){
        //  $subjectids=new teacher_subject([
        //     'subject_id'=> $subject
        //  ]);
         $teacher->subject()->attach($subjects);
       // }
        
        return redirect('teachers');
    }




    public function ShowTeacherAndSubject($id){
        $Teacher=Teacher::find($id);
        $subject=Subject::all();
        return view('EditTeacher',['Teacher'=>$Teacher],['subjects'=>$subject]);
    }



    public function UpdateTeacher(Request $req){

        // dd(Teacher::find($))
     $teacher=Teacher::find($req->id);
	$teacher->update([
		'name'=> $req->name,
        'address'=> $req->address,
        'phone_number'=> $req->phone,
        'email'=> $req->email
	]);

    // $subjectsIDs= $req->subjects_id;
    // foreach($subjectsIDs as $subjectsID){

    //     teacher_subject::where('teacher_id', '=', $req->id)
    //     ->update([
    //         'subject_id'=> $subjectsID
    //     ]);

    // }

    $teacher->subject()->sync($req->subjects_id);
    return redirect('teachers');

    }

    public function Delete($id){
     $teacher= Teacher::find($id);
     $teacher->delete();

     return redirect('teachers');
    }
}
