<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotificationCustom extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via(object $notifiable): array
    {
        return ['resend'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        // Send email manually using Resend API
        $response = Http::withToken(env('RESEND_API_KEY'))
            ->post('https://api.resend.com/emails', [
                'from' => env('MAIL_FROM_NAME') . ' <' . env('MAIL_FROM_ADDRESS') . '>',
                'to' => [$notifiable->email],
                'subject' => 'Reset Your Password - Vibrant Club PH',
                'html' => "
                    <p><strong>MAGANDANG BUHAY!</strong></p>
                    <p>We received a request to reset your password.</p>
                    <p>
                        <a href='{$resetUrl}' style='background:#ff0084;color:white;padding:10px 20px;text-decoration:none;border-radius:4px;'>Reset Password</a>
                    </p>
                    <p>This password reset link will expire in 60 minutes.</p>
                    <p>If you didn’t request this, you can safely ignore this email.</p>
                    <p>Regards, <br> Vibrant Club PH</p>
                ",
            ]);

        if ($response->failed()) {
            logger()->error('Resend email failed', ['body' => $response->body()]);
        }

        // Return dummy MailMessage to satisfy Laravel
        return (new MailMessage)
            ->subject('Password reset requested')
            ->line('If your email exists, a password reset link has been sent.');
    }
}
