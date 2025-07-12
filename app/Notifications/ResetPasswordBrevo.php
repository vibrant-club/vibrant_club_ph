<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Configuration;
use SendinBlue\Client\Model\SendSmtpEmail;

class ResetPasswordBrevo extends Notification
{
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail']; // required by Laravel
    }

    public function toMail($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        // Brevo API setup
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('BREVO_API_KEY'));
        $apiInstance = new TransactionalEmailsApi(new Client(), $config);

        // Prepare email
        $sendSmtpEmail = new SendSmtpEmail([
            'subject' => 'Reset Your Password – Vibrant Club PH',
            'sender' => [
                'name' => env('MAIL_FROM_NAME', 'Vibrant Club PH'),
                'email' => env('MAIL_FROM_ADDRESS', 'vibrant.club.ph@gmail.com'),
            ],
            'to' => [[ 'email' => $notifiable->email ]],
            'htmlContent' => '
                <p>Hi ' . htmlspecialchars($notifiable->name ?? 'there') . ',</p>
                <p>You requested a password reset for your Vibrant Club PH account.</p>
                <p><a href="' . $resetUrl . '" style="background:#ff0084;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;">Reset Password</a></p>
                <p>If you didn’t request this, you can ignore this email.</p>
                <p>– Vibrant Club PH Team</p>
            ',
        ]);

        // Send the email
        try {
            $apiInstance->sendTransacEmail($sendSmtpEmail);
        } catch (\Exception $e) {
            logger()->error('Brevo password reset failed: ' . $e->getMessage());
        }

        // Laravel expects a MailMessage return, so we return dummy success
        return (new \Illuminate\Notifications\Messages\MailMessage)
            ->line('If your email is registered, a password reset link has been sent.');
    }
}
