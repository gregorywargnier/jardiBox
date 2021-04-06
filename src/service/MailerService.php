<?php

namespace App\service;

use App\Entity\Contact;
use App\Entity\User;
use Swift_Mailer;
use Swift_Message;
use Twig\Environment;

class MailerService{

    private $mailer;
    /**
     * @var string[]
     */
    private $templatesLinks;
    /**
     * @var Environment
     */
    private $view;

    public function __construct(Swift_Mailer $mailer, Environment $view)
    {
        $this->mailer = $mailer;
        $this->view = $view;
        $this->templatesLinks = [
            "resetPassword" => "mail/resetPassword.html.twig",
            "activationLink" => "mail/activationLink.html.twig",
            "contactMessage" => "mail/contactMessage.html.twig",
        ];
    }

    public function sendActivationMail(User $user, string $url, string $type)
    {
        $template = $this->templatesLinks[$type];

        $contactMail = (new Swift_Message("An important email from Jardibox.com"))
            ->setFrom("admin@jardibox.com")
            ->setTo($user->getEmail())
            ->setBody(
                $this->view->render($template, [
                    "url" => $url
                ]), "text/html"
            );

        $this->mailer->send($contactMail);
    }

    public function sendResetPassword( User $user, string $url, string $type)
    {
        $template = $this->templatesLinks[$type];

        $contactMail = (new Swift_Message("An important email from Jardibox.com"))
            ->setFrom("admin@jardibox.com")
            ->setTo($user->getEmail())
            ->setBody(
                $this->view->render($template, [
                    "url" => $url
                ]), "text/html"
            );

        $this->mailer->send($contactMail);
    }

    public function sendContactMessage(Contact $contact, string $type)
    {
        $template = $this->templatesLinks[$type];
        $contactMail = (new Swift_Message("An important email from Jardibox.com"))
        ->setFrom("admin@jardibox.com")
            ->setTo($contact->getEmail())
            ->setBody(
                $this->view->render($template
                ), "text/html"
            );
        $this->mailer->send($contactMail);
    }


}