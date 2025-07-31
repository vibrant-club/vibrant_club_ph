<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Services\SendGridService;

class ResetPasswordNotificationCustom extends Notification
{
    use Queueable;

    public $token;

    protected $sendGrid;

    public function __construct($token)
    {
        $this->token = $token;
        $this->sendGrid = new SendGridService();
    }

    public function via(object $notifiable): array
    {
        return ['sendgrid'];
    }

    public function toSendgrid($notifiable)
    {
        $resetUrl = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));

        $email = $notifiable->email;

        $subject = 'Your Custom Password Reset';
        $content = <<<HTML
<p>You requested a password reset.</p>
<p><a href="{$resetUrl}" style="background-color:#1a73e8;color:white;padding:10px 20px;text-decoration:none;border-radius:5px;">Reset Password</a></p>
<p>If you did not request this, no further action is required.</p>
HTML;

        $this->sendGrid->sendEmail(
            $email,
            $subject,
            $content
        );
    }
}
