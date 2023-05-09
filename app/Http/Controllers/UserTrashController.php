<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserTrashController extends Controller
{
    function index()
    {
        return view('userRecycle', ['users' => User::onlyTrashed()->get()]);
    }

    function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return redirect()->route('users.trash');
    }

    function delete($id)
    {
        User::onlyTrashed()->find($id)->forcedelete();
        return redirect()->route('users.trash');
    }
}
