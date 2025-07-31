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
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        return (new MailMessage)
            ->from('vibrant.club.ph@gmail.com', 'VIBRANT CLUB PH')
            ->subject('Let’s Get You Back In – Password Reset')
            ->greeting('Hi there,')
            ->line('It looks like you requested a password reset. No problem—we’re here to help! Just click the button below to set a new password and get back in the groove.')
            ->action('Reset Your Password', $url)
            ->line('Didn’t make this request? No worries. You can safely ignore this email.')
            ->line("At Vibrant Club PH, we're all about empowering creators and go-getters like you.")
            ->line('*Where Influencers Rise, Connect, and Succeed.*')
            ->salutation("See you back soon,\nVIBRANT CLUB PH 💫");
    }
}
