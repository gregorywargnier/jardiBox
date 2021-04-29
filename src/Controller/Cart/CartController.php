<?php


namespace App\Controller\Cart;


use App\service\CartService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CartController extends AbstractController
{
    public function __invoke( CartService $cartService): Response
    {

        return $this->render('cart/index.html.twig',[
            'items' => $cartService->fullCart(),
            'total' => $cartService->total()
        ]);
    }
}