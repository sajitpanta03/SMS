<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

trait sendMailTrait{
    public function sendMailTT($to, $message){
        $maildata = [
            'title' => 'Account Created',
            'body' => 'Your Account has been Created in Student Management System',
            'password' => $message
        ];
        
        Mail::to($to)->send(new MailNotify($maildata));
    }
}

?>