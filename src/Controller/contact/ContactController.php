<?php

namespace App\Controller\contact;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends AbstractController
{

    public function __invoke(Request $request): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($contact);
            $em->flush();
            //email for contact us
           // $mailerService->sendContactMessage($contact->getEmail(), $contact);
            //homepage message after the user ask information
           // $this->addFlash('green accent-3', 'Votre demande a bien été enregistré, Il sera traité dans les plus bref délais');
            return $this->redirectToRoute('home');
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}