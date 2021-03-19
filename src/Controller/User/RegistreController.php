<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Form\RegisterType;
use App\service\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegistreController extends AbstractController
{
    private $encoder;

    private $urlGenerator;
    private $UserService;

    public function __construct(UserPasswordEncoderInterface $encoder, UserService $UserService, UrlGeneratorInterface $urlGenerator)
    {
        $this->encoder = $encoder;
        $this->urlGenerator = $urlGenerator;
        $this->UserService = $UserService;
    }

    public function __invoke(Request $request): Response
    {
        if ($this->getUser()) {

            return $this->redirectToRoute('home');

        }

        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $this->encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($password);
            $user->setRoles(["ROLE_USER"]);

           $this->UserService->generateToken($user);


            $em = $this->getDoctrine()->getManager();

            $em->persist($user);
            $em->flush();

           // $this->mailer->sendActivationMail($user);

           // $this->addFlash('green accent-3', 'Votre compte à bien été créé, activez le pour pouvoir vous connecter');
            return $this->redirectToRoute('login');
        }
        return $this->render('user/registre.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}