<?php

namespace App\Services;

use Twilio\Rest\Client;

class WhatsAppTwilioService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendMessage($to, $message)
    {
        $from ='whatsapp:+14155238886';

        try {
            $this->twilio->messages->create(
                "whatsapp:$to", // Recipient's WhatsApp number
                [
                    'from' => $from,
                    'body' => $message,
                ]
            );

            return 'Message sent successfully!';
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
