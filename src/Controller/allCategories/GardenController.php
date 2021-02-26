<?php

namespace App\Controller\allCategories;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class GardenController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('allCategories/garden.html.twig', [
            'controller_name' => 'GardenController',
        ]);
    }
}