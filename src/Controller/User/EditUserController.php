<?php


namespace App\Controller\User;


use App\Form\EditUserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EditUserController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        $user= $this->getUser();
        $form= $this->CreateForm(EditUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            $this->addFlash('success', "Votre profil a été modifié");

            return $this->redirectToRoute('account');
        }
        return $this->render('user/editUser.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}