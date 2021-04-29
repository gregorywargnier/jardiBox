<?php


namespace App\Controller\Cart;


use App\service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AddCartController extends AbstractController
{
    public function __invoke($id, CartService $cartService): Response
    {
        $cartService->add($id);

        return $this->redirectToRoute("Cart");
    }
}