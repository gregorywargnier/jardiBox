<?php


namespace App\Controller\Product;


use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OneProductController extends AbstractController
{
    public function __invoke(Product $product): Response
    {
        return $this->render('product/oneProduct.html.twig', [
            'product' => $product
        ]);
    }
}