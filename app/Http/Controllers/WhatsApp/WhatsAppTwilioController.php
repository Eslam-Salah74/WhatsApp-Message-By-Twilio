<?php

namespace App\Http\Controllers\WhatsApp;

use App\Http\Controllers\Controller;
use App\Services\WhatsAppTwilioService;

class WhatsAppTwilioController extends Controller
{
    protected $whatsappServiceTwilio;

    public function __construct(WhatsAppTwilioService $whatsappServiceTwilio)
    {
        $this->whatsappServiceTwilio = $whatsappServiceTwilio;
    }

    public function sendWhatsAppMessage()
    {
        $to = '+201110731636'; // Recipient's number
        $message = 'السلام عليكم ورحمة الله ';

        $response = $this->whatsappServiceTwilio->sendMessage($to, $message);

        return response()->json(['message' => $response]);
    }
}
