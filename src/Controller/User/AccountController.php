<?php


namespace App\Controller\User;


use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccountController extends AbstractController
{
    public function __invoke(UserRepository $user): Response
    {
        $account= $user->findAll();
        return $this->render('user/account.html.twig', [
            'Account' => '$account',
        ]);
    }
}