<?php


namespace App\Controller\User\Password;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends AbstractController
{

    public function __invoke(Request $request, string $token): Response
    {
        return $this->render('user/Password/ResetPassword.html.twig', [
            'controller_name' => 'ResetPasswordController',
        ]);
    }

}
