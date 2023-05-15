<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function show()
    {
        $data = Subject::all();
        return view('subject', ['subjects'=>$data]);
    }

    public function delete($id)
    {
        $data = Subject::find($id);
        $data->delete();
        return redirect('subjects');
    }

    public function ShowData($id)
    {
        $data = Subject::find($id);
        return view('EditSubject', ['data'=>$data]);
    }

    public function edit(Request $request)
    {
        $data = Subject::find($request->id);
        $data->name = $request->name;
        $data->full_mark = $request->full_mark;
        $data->pass_mark = $request->pass_mark;
        $data->save();
        return redirect('subjects');
    }

    public function add(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required|max:255',
        //     'full_mark' => 'required|numeric|min:2|max:5',
        //     'pass_mark' => 'required|numeric|min:2|max:5',
        // ]);

        $teacher=Subject::create([
            'name'=> $request->name,
            'full_mark'=> $request->full_mark,
            'pass_mark'=> $request->pass_mark,
        ]);
        return redirect('subjects');
    }
}
