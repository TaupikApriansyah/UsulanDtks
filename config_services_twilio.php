<?php

// Tambahkan entry berikut ke dalam file config/services.php yang sudah ada
// (jangan replace seluruh file, cukup tambahkan bagian 'twilio' ini)

return [

    // ... entry lain yang sudah ada (mailgun, postmark, ses, dsb) ...

    /*
    |--------------------------------------------------------------------------
    | Twilio WhatsApp Configuration
    |--------------------------------------------------------------------------
    | [FIX #12] Pindahkan konfigurasi Twilio ke sini agar bisa diakses
    | via config('services.twilio.*') dan di-cache dengan php artisan config:cache
    |
    | Tambahkan ke .env:
    |   TWILIO_SID=your_account_sid
    |   TWILIO_AUTH_TOKEN=your_auth_token
    |   TWILIO_WHATSAPP_FROM=whatsapp:+14155238886
    */
    'twilio' => [
        'sid'            => env('TWILIO_SID'),
        'auth_token'     => env('TWILIO_AUTH_TOKEN'),
        'whatsapp_from'  => env('TWILIO_WHATSAPP_FROM'),
    ],

];
