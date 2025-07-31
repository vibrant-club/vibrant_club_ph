<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordSendGrid extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', ['token' => $this->token, 'email' => $notifiable->getEmailForPasswordReset()], false));

        return (new MailMessage)
            ->from('vibrant.club.ph@gmail.com', 'VIBRANT CLUB PH')
            ->subject('Reset Your Password')
            ->line('You requested a password reset.')
            ->action('Reset Password', $url)
            ->line('If you didn\'t request this, no action is needed.');
    }
}
