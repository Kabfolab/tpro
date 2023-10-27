<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CustomEmail;
use Mail;
class EmailController extends Controller
{
    
    public function sendEmailForm()

    
    {
        return view('eml');
    }

    public function sendEmail(Request $request)
    {
        // Your email sending logic goes here
        // Use Laravel's built-in Mail facade or any email library you prefer

        // Example:
        $to = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        Mail::to($to)->send(new \App\Mail\CustomEmail($subject, $message));

        return redirect('/eml')->with('success', 'Email sent successfully');
    }
}


