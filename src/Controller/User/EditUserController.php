<?php


namespace App\Controller\User;

use App\Form\EditUserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class EditUserController extends AbstractController
{
    public function __invoke(UserRepository $user, Request $request): Response
    {
        $user= $this->getUser();
        $form= $this->CreateForm(EditUserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('account');
        }
        return $this->render('user/editUser.html.twig',[
            'form' => $form->createView(),
            ]);

    }

}