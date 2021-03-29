<?php

namespace App\service;

use App\Entity\User;
use Swift_Mailer;
use Swift_Message;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MailerService{

    private $urlGenerator;
    private $mailer;

    public function __construct(UrlGeneratorInterface $urlGenerator, Swift_Mailer $mailer)
    {
        $this->urlGenerator = $urlGenerator;
        $this->mailer = $mailer;
    }




    private function send( $email, $text ){
        $message = new Swift_Message();
        $message->setFrom( 'no-reply@jardibox.com' );
        $message->setTo( $email );
        $message->setBody( $text );

        $this->mailer->send( $message );
    }


    public function sendContactMessage($email)
    {
        $text = "
                Bonjour,
                votre demande à bien été pris en compte. Elle sera traité dans les plus bref délais.
                Cordialement,
                l'équipe de Désirvoyage";

        $this->send( $email, $text);
    }
}