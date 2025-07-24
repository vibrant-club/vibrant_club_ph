<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class ResendChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (!property_exists($notification, 'token')) {
            return;
        }

        $token = $notification->token;

        $resetUrl = url(route('password.reset', [
            'token' => $token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        $html = "
            <p><strong>MAGANDANG BUHAY!</strong></p>
            <p>We received a request to reset your password.</p>
            <p>
                <a href='{$resetUrl}' style='background:#ff0084;color:white;padding:10px 20px;text-decoration:none;border-radius:4px;'>Reset Password</a>
            </p>
            <p>This password reset link will expire in 60 minutes.</p>
            <p>If you didn’t request this, you can safely ignore this email.</p>
            <p>Regards, <br> Vibrant Club PH</p>
        ";

        $response = Http::withToken(env('RESEND_API_KEY'))->post('https://api.resend.com/emails', [
            'from' => env('MAIL_FROM_NAME') . ' <' . env('MAIL_FROM_ADDRESS') . '>',
            'to' => [$notifiable->email],
            'subject' => 'Reset Your Password - Vibrant Club PH',
            'html' => $html,
        ]);

        if ($response->failed()) {
            logger()->error('Resend email failed', ['body' => $response->body()]);
        }
    }
}
