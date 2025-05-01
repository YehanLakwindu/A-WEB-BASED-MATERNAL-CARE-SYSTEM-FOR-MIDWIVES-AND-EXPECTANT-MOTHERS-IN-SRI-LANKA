<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index()
    {
        return view('emails.sendMail'); // Frontend form
    }

    public function send(Request $request)
    {
        // Validate request data, including date and time
        $request->validate([
            'recipient_email' => 'required|email',
            'message_type' => 'required|in:home_visit,clinic_visit,vaccination_baby,vaccination_mother,triposha_distribution',
            'date' => 'required|date',
            'time' => 'required',
            'custom_message' => 'nullable|string|max:1000',
        ]);

        // Predefined messages for different types
        $messageTemplates = [
            'home_visit' => 'Dear mother, your home visit is scheduled.',
            'clinic_visit' => 'Dear mother, your clinic visit is scheduled.',
            'vaccination_baby' => 'Dear parent, your baby’s vaccination is due.',
            'vaccination_mother' => 'Dear mother, your vaccination is due.',
            'triposha_distribution' => 'Dear recipient, your triposha distribution is scheduled.',
        ];

        $subject = ucfirst(str_replace('_', ' ', $request->message_type)); // Convert message_type to a readable subject
        $body = $messageTemplates[$request->message_type]; // Default body

        // Append date and time to the message
        $body .= "\n\nDate: " . $request->date;
        $body .= "\nTime: " . $request->time;

        // Append custom message if provided
        if ($request->custom_message) {
            $body .= "\n\nCustom Message: " . $request->custom_message;
        }

        // Prepare email data
        $mailData = [
            'title' => $subject,
            'body' => $body,
        ];

        try {
            // Send email
            Mail::to($request->recipient_email)->send(new DemoMail($mailData));

            return back()->with('success', 'Email sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error sending email: ' . $e->getMessage());
        }
    }
}
