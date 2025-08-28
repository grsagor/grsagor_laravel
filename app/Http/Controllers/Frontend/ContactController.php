<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function generateCaptcha()
    {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        session(['captcha_answer' => $num1 + $num2]);

        return response()->json([
            'question' => "$num1 + $num2 = ?"
        ]);
    }

    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required'
        ]);

        if ($request->captcha != session('captcha_answer')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Incorrect security answer. Please try again.'
            ]);
        }

        // Send mail
        Mail::raw($request->message, function ($mail) use ($request) {
            $mail->to('your-email@example.com')
                ->from($request->email, $request->name)
                ->subject($request->subject);
        });

        return response()->json([
            'status' => 'success',
            'message' => 'Your message has been sent successfully!'
        ]);
    }
}
