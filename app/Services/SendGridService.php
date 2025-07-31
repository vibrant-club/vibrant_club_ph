<?php

namespace App\Services;

use SendGrid;
use SendGrid\Mail\Mail;

class SendGridService
{
    protected $sendgrid;

    public function __construct()
    {
        // Manually pass API key from config
        $this->sendgrid = new SendGrid(config('services.sendgrid.api_key'));
    }

    public function sendEmail($to, $subject, $htmlContent)
    {
        $email = new Mail();
        $email->setFrom("no-reply@yourdomain.com", "Your App Name");
        $email->setSubject($subject);
        $email->addTo($to);
        $email->addContent("text/html", $htmlContent);

        try {
            return $this->sendgrid->send($email);
        } catch (\Exception $e) {
            logger()->error('SendGrid Error: ' . $e->getMessage());
            return false;
        }
    }
}
