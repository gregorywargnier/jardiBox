<?php


namespace App\Controller\Product;


use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    public function __invoke(Request $request, ProductRepository $productRepository): Response
    {
        $myCategory= $request->query->get('category');

        $product= $productRepository->findBy(
            ['allCategory'=> $myCategory]
        );
        return $this->render( 'product/product.html.twig',[
            'allCategory'=> $product,
        ]);
    }
}