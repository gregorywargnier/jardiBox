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
        $category = $request->query->get('categories');
        $myUniverse = $allCategoryRepository->findBy(
            ['universe' => $category]
        );
        return $this->render('allCategories/allCategories.html.twig', [
            'categories' => $category,
            'universe' => $myUniverse,
        ]);
    }

}