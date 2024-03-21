<?php

namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailService {
    private $mailer;

    public function __construct(MailerInterface $mailer) {
        $this->mailer = $mailer;
    }

    public function sendRegistrationEmail($user) {
        $email = (new Email())
            ->from('hello@example.com')
            ->to($user->getEmail())
            ->subject('Witamy w serwisie!')
            ->text('Szczegóły rejestracji...');

        $this->mailer->send($email);
    }
}