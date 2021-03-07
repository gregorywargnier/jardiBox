<?php

namespace App\Controller\allCategories;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class AnimalsController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('allCategories/animals.html.twig', [
            'controller_name' => 'AnimalsController',
        ]);
    }
}