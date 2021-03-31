<?php


namespace App\Controller\contact;


use App\Entity\Newsletter;
use App\Form\NewsletterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsletterController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $newsletter = new Newsletter();
        $form = $this->createForm(NewsletterType::class, $newsletter);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($newsletter);
            $em->flush();

            $this->addFlash('success', 'Vous êtes bien enregistré');
            return $this->redirectToRoute('home');
        }
        return $this->render('newsletter/newsletter.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}