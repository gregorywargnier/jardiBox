<?php


namespace App\Controller\User\Password;


use App\Entity\User;
use App\service\MailerService;
use App\service\UserService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordController extends AbstractController
{
    private $UserService;
    private $encoder;
    private $mailer;

    public function __construct(UserService $userService, UserPasswordEncoderInterface $encoder, MailerService $mailer)
    {
        $this->UserService = $userService;
        $this->encoder = $encoder;
        $this->mailer = $mailer;
    }

    public function __invoke(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');

            $entityManager = $this->getDoctrine()->getManager();
            $user = $entityManager->getRepository(User::class)->findOneByEmail($email);
            if ($user) {
                $this->UserService->generateToken($user);
                $entityManager->flush();

                // $this->mailer->sendResetPassword($user);
            }
            return $this->redirectToRoute('home');
        }
        return $this->render('user/Password/forgot_Password.html.twig');
    }
}
