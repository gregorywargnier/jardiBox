<?php


namespace App\Controller\User\Password;



use App\Form\RenewPasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RenewPasswordController extends AbstractController
{
    private $encoder;
    private $router;

    public function __construct(UserPasswordEncoderInterface $encoder, UrlGeneratorInterface $router)
    {
        $this->encoder = $encoder;
        $this->router = $router;
    }

    public function __invoke(Request $request): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(RenewPasswordType::class, []);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $newPassword = $form["password"]->getData("password");

            $user->setPassword($this->encoder->encodePassword($user, $newPassword));

            $this
                ->getDoctrine()
                ->getManager()
                ->flush();

            //$this->addFlash('green accent-3', "Votre mot de passe a bien été modifié.");

            return new RedirectResponse($this->router->generate("account"));
        }

        return $this->render("user/Password/RenewPassword.html.twig", [
            "form" => $form->createView(),
        ]);
    }
}
