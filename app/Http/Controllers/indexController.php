<?php

namespace App\Http\Controllers;

use App\Mail\comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class indexController extends Controller
{
    public function sendEmail(Request $request)
    {
    	//request data
        $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'comments' => 'required|string|max:255',
            ]);

		$name = request('name');
		$email = request('email');
		$comments = request('comments');
        // send email
        
        Mail::to(request('email'))->send(new comments($name, $email, $comments));

        return redirect('/');
    }
}
