<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    function show()
    {
        $data = Subject::all();
        return view('subject', ['subjects' => $data]);
    }

    function delete($id)
    {
        $data = Subject::with('student')->find($id);
        dd($data->student);
        $data->delete();
        return redirect('subjects');
    }

    function ShowData($id)
    {
        $data = Subject::find($id);
        return view('EditSubject', ['data'=>$data]);
    }

    function edit(Request $req)
    {
        $data = Subject::find($req->id);
        $data->name = $req->name;
        $data->full_mark = $req->full_mark;
        $data->pass_mark = $req->pass_mark;
        $data->save();
        return redirect('subjects');
    }

    function add(Request $req)
    {
        $data = new Subject();
        $data->name = $req->name;
        $data->full_mark = $req->full_mark;
        $data->pass_mark = $req->pass_mark;
        $data->save();
        return redirect('subjects');
    }
}
