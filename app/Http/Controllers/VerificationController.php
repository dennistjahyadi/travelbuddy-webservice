<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Result;
use App\Verify;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    //

    public function sendMail(Request $request){
    	$result = Verify::check($request);
    	if($result){
    		return $result;
    	}
    	
    	$code = $request->input('code');
    	$email = $request->input('email');
    	$data = array('code' => $code);
        Mail::send('mail.emailverification', compact('data'), function($message) use ($email){
            $message->to($email, '-')->subject
                    ('Verification email');
            $message->from('no-reply@travelbuddy.com', 'TravelBuddy');
        });
    	return Result::ok();

    }
}
