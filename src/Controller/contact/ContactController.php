<?php

namespace App\Controller\contact;

use App\Entity\Contact;
use App\Form\ContactType;
use App\service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{
    private $mailer;

    public function __construct(MailerService $mailer)
    {

        $this->mailer = $mailer;

    }
    public function __invoke(Request $request, MailerService $mailerService): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($contact);
            $em->flush();
            //email for contact us
            $mailerService->sendContactMessage($contact,"contactMessage" );
            //homepage message after the user ask information
            $this->addFlash('success', 'Votre demande a bien été enregistré, Il sera traité dans les plus bref délais');
            return $this->redirectToRoute('home');
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}