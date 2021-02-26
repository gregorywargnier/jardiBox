<?php

namespace App\Controller\allCategories;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class HouseController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('allCategories/house.html.twig', [
            'controller_name' => 'HouseController',
        ]);
    }
}