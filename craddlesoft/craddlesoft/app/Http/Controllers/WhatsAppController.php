<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Exception;

class WhatsAppController extends Controller
{
    public function index()
    {
        return view('whatsapp');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\+?[1-9]\d{1,14}$/',
            'message_type' => 'required|in:home_visit,clinic_visit,vaccination_baby,vaccination_mother,triposha_distribution',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $twilioSid = env('TWILIO_SID');
        $twilioToken = env('TWILIO_AUTH_TOKEN');
        $twilioWhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');
        $recipientNumber = $request->phone;
        $name = $request->name;
        $date = $request->date;
        $time = $request->time;

        // Pre-defined message templates
        $templates = [
            'home_visit' => "Dear $name, your home visit has been scheduled.\nDate: $date\nTime: $time\nPlease ensure you are available at the given time. - CraddleSoft",
            'clinic_visit' => "Dear $name, your clinic visit has been scheduled.\nDate: $date\nTime: $time\nPlease visit your assigned clinic. - CraddleSoft",
            'vaccination_baby' => "Dear $name, your baby's vaccination has been scheduled.\nDate: $date\nTime: $time\nPlease bring your child to the assigned clinic. - CraddleSoft",
            'vaccination_mother' => "Dear $name, your vaccination has been scheduled.\nDate: $date\nTime: $time\nPlease visit the assigned clinic for your vaccination. - CraddleSoft",
            'triposha_distribution' => "Dear $name, the distribution of Triposha has been scheduled.\nDate: $date\nTime: $time\nPlease visit the distribution center to collect your supply. - CraddleSoft",
        ];

        // Determine the message to send based on the type
        $message = $templates[$request->message_type];

        try {
            $twilio = new Client($twilioSid, $twilioToken);

            $twilio->messages->create(
                "whatsapp:$recipientNumber",
                [
                    "from" => "whatsapp:$twilioWhatsAppNumber",
                    "body" => $message,
                ]
            );

            return back()->with('success', 'Message sent successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
