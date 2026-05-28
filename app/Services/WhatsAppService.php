<?php

namespace App\Services;

use RuntimeException;
use Twilio\Rest\Client;

class WhatsAppService
{
    protected Client $twilio;
    protected string $from;

    public function __construct()
    {
        $sid = config('services.twilio.sid');
        $token = config('services.twilio.auth_token');
        $from = config('services.twilio.whatsapp_from');

        if (!$sid || !$token || !$from) {
            throw new RuntimeException('Konfigurasi Twilio WhatsApp belum lengkap di .env.');
        }

        $this->twilio = new Client($sid, $token);
        $this->from = $from;
    }

    public function sendMessage(string $to, string $message)
    {
        if (!str_starts_with($to, '+')) {
            $to = '+62' . ltrim($to, '0');
        }

        return $this->twilio->messages->create('whatsapp:' . $to, [
            'from' => $this->from,
            'body' => $message,
        ]);
    }
}
