<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class ResetPasswordResend extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail']; // Laravel still expects this
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        $response = Http::withToken(env('RESEND_API_KEY'))
            ->post('https://api.resend.com/emails', [
                'from' => env('MAIL_FROM_NAME') . ' <' . env('MAIL_FROM_ADDRESS') . '>',
                'to' => [$notifiable->email],
                'subject' => 'Reset Your Password - Vibrant Club PH',
                'html' => "
                    <p>Hi!</p>
                    <p>You requested a password reset.</p>
                    <p><a href='{$resetUrl}' style='background:#ff0084;color:white;padding:10px 20px;text-decoration:none;border-radius:4px;'>Reset Password</a></p>
                    <p>This link will expire in 60 minutes.</p>
                    <p>– Vibrant Club PH</p>
                ",
            ]);

        if ($response->failed()) {
            logger()->error('Resend email failed: ' . $response->body());
        }

        // Laravel still expects this to return a MailMessage, even if unused
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->line('A password reset link has been sent to your email if it exists.');
    }
}
