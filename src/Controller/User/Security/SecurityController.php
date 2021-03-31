<?php

namespace App\Controller\User\Security;

use App\service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    private $UserService;

    public function __construct(UserService $userService)
    {


        $this->UserService = $userService;

    }


    public function __invoke(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('home');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('user/security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    public function logout()
    {
    }
}
