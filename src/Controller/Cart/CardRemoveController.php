<?php


namespace App\Controller\Cart;


use App\service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CardRemoveController extends AbstractController
{
    public function __invoke($id, CartService $cartService):Response
    {
        $cartService->remove($id);

        return $this->redirectToRoute("Cart");
    }
}