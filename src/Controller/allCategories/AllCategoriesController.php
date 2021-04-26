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

        if($myUniverse){
            $category = $allCategoryRepository->findBy(
                ['universe' => $myUniverse]
            );
        }else{
            $category = $allCategoryRepository->findall();
        }
        return $this->render('allCategories/allCategories.html.twig', [
            'universe' => $category,
        ]);
    }

}