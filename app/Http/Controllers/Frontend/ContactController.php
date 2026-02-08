<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

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
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required'
        ]);

        // Validate captcha
        if ($request->captcha != session('captcha_answer')) {
            return response()->json([
                'status' => 'error',
                'message' => 'Incorrect security answer. Please try again.'
            ], 422);
        }

        try {
            // Save to database
            $contact = Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'is_read' => false
            ]);

            // Send email notification
            $recipientEmail = config('mail.from.address', 'grsagor08@gmail.com');
            
            try {
                Mail::html(
                    view('emails.contact-notification', [
                        'name' => $request->name,
                        'email' => $request->email,
                        'subject' => $request->subject,
                        'message' => $request->message
                    ])->render(),
                    function ($mail) use ($request, $recipientEmail) {
                        $mail->to($recipientEmail)
                            ->subject('New Contact Form Submission: ' . $request->subject)
                            ->replyTo($request->email, $request->name);
                    }
                );
            } catch (\Exception $e) {
                // Log email error but don't fail the request
                Log::error('Contact form email failed: ' . $e->getMessage());
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Your message has been sent successfully! I\'ll get back to you soon.'
            ]);

        } catch (\Exception $e) {
            Log::error('Contact form submission failed: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong. Please try again later.'
            ], 500);
        }
    }
}
