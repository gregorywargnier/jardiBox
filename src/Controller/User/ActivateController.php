<?php


namespace App\Controller\User;


use App\Entity\User;
use App\service\UserService;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ActivateController extends AbstractController
{
    private $UserService;
    private $urlGenerator;

    public function __construct(UserService $UserService,UrlGeneratorInterface $urlGenerator){
        $this->UserService = $UserService;
        $this->urlGenerator = $urlGenerator;
    }

    public function __invoke(User $user, string $token): Response
    {
        if (!$user->getEnabled()) {
            if ($user->getTokenExpire() > new DateTime()) {
                // set enable true and token null if valid condition
                $user->setEnabled(true);
                $this->UserService->resetToken($user);
                // database entry
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                // add message if account is activate
                $this->addFlash(
                    'primary',
                    'Votre compte a été activé');
            }
        }
        // redirect to login route
        return $this->redirectToRoute('login');
    }
}