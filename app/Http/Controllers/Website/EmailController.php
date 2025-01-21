<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendDemoMail;

class EmailController extends Controller
{
    public function sendEmail()
    {

        // Email details
        $details = [
            'title' => 'Mail from Laravel 9',
            'body' => 'This is a test email sent using Laravel 9.'
        ];

        // Recipient email address
        $recipient = 'bcmkartik1995@gmail.com';

        // Send the email
        Mail::to($recipient)->send(new SendDemoMail($details));

        return response()->json(['message' => 'Email sent successfully!']);

    }
}













