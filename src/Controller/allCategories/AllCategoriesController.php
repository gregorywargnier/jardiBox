<?php


namespace App\Controller\allCategories;


use App\Repository\AllCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AllCategoriesController extends AbstractController
{
    public function __invoke(Request $request, AllCategoryRepository $allCategoryRepository): Response
    {
        $myUniverse = $request->query->get('OurUniverse');

        $category = $allCategoryRepository->findBy(
            ['universe' => $myUniverse]
        );

        return $this->render('allCategories/allCategories.html.twig', [
            'universe' => $category,

        ]);
    }

}