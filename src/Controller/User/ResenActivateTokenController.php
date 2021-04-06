<?php


namespace App\Controller\User;


use App\Entity\User;
use App\service\MailerService;
use App\service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ResenActivateTokenController extends AbstractController
{
    private $UserService;
    private $mailer;

    public function __construct(UserService $UserService, MailerService $mailer){
        $this->UserService = $UserService;
        $this->mailer = $mailer;
    }

    public function __invoke(User $user): Response
    {
        if (!$user->getEnabled()) {
            // generate token and expire date
            $this->UserService->generateToken($user);
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            $activationUrl = $this->generateUrl("user_activate", [
                'token' => $user->getToken(),
            ], false);

            // resend a activation token
            $this->mailer->sendActivationMail($user, $activationUrl, "activationLink");
            // message if link is send.
            $this->addFlash(
                'primary',
                'Un lien d\'activation vous a été envoyé');
            // redirect to login route
            return $this->redirectToRoute('login');
        }
    }
}