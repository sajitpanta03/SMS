<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        $maildata = [
            'title' => 'Account Created',
            'body' => 'Your Account has been Created in Student Management System',
            'password' => ''
        ];
 
        Mail::to('wadangkaacham@gmail.com')->send(new MailNotify($maildata));

        dd('email send');
    }
}
