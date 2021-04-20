<?php


namespace App\Controller\Product;


use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class OneProductController extends AbstractController
{
    public function __invoke(Product $product)
    {
        return $this->render('product/oneProduct.html.twig', [
            'product' => $product
        ]);
    }
}