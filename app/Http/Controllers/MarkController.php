<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Mark;
use App\Models\Exam;

class MarkController extends Controller
{
    function show(){    
        return view('Mark' ,['students'=> Student::paginate(25),'exam'=>Exam::all(), 'mark'=>Mark::all() ]);
    }
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $students = Student::query()
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhere('email', 'like', '%' . $keyword . '%')
            ->paginate(25);
    
        return view('Mark', ['students' => $students,'exam'=>Exam::all(), 'mark'=>Mark::all()]  );
    }


    public function edit($id)
    {
        $data = Student::find($id);
            
        return view('editmark', ['student' => $data, 'subject'=>Subject::all(),'exam'=>Exam::all()]);
    }
    public function markAdd(Request $request){

        $i=0;

        $data = Mark::where([
            ['student_id', '=', $request->student_id],
            ['exam_id', '=', $request->exam_id]
        ])->get();
        // dd($request->all());
        if ($data->isNotEmpty()) {
            
                foreach ($data as $mark) {
                        // echo 'already data added';
                        $mark->update([
                            'obtained_mark' => $request->mark[$i]
                        ]);
                    
                    // else{

                    //     Mark::create([
                    //         'full_mark'=>$request->full_mark[$i],
                    //         'pass_mark' => $request->pass_mark[$i],
                    //         'obtained_mark' => $request-> mark[$i],
                    //         'student_id' => $request->student_id,
                    //         'exam_id' => $request->exam_id,
                    //         'subject_id' => $request->subject_id[$i],
                    //         'added_by' =>1               
                    //     ]);
                    // }
                    $i++;
                }
        }else{
            // echo 'am empty';
            foreach ($request->subject_id as $i => $subject) {
                // dd($subject);
                Mark::create([
                    'full_mark' => $request->full_mark[$i],
                    'pass_mark' => $request->pass_mark[$i],
                    'obtained_mark' => $request->mark[$i],
                    'student_id' => $request->student_id,
                    'exam_id' => $request->exam_id,
                    'subject_id' => $request->subject_id[$i],
                    'added_by' => 1
                ]);
                $i++;
            }
            
        }
        return   $this->show();
    }
    function create($i,$request){
        
            Mark::create([
                'full_mark'=>$request->full_mark[$i],
                'pass_mark' => $request->pass_mark[$i],
                'obtained_mark' => $request-> mark[$i],
                'student_id' => $request->student_id,
                'exam_id' => $request->exam_id,
                'subject_id' => $request->subject_id[$i],
                'added_by' =>1               
            ]);
    }
}