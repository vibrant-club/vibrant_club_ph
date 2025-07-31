<?php

namespace App\Services;

use SendGrid;
use SendGrid\Mail\Mail;

class SendGridService
{
    protected $sendgrid;

    public function __construct()
    {
        $this->sendgrid = new SendGrid(config('services.sendgrid.api_key'));
    }

    public function sendEmail($to, $subject, $htmlContent, $buttonText = null, $buttonUrl = null)
    {
        $email = new Mail();
        $email->setFrom("vibrant.club.ph@gmail.com", "Vibrant Club PH");
        $email->setSubject($subject);
        $email->addTo($to);

        $email->addContent("text/html", $htmlContent);

        try {
            $response = $this->sendgrid->send($email);
            return $response;
        } catch (\Exception $e) {
            logger()->error('SendGrid Error: ' . $e->getMessage());
            return false;
        }
    }
}
