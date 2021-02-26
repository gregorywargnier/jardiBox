<?php

namespace App\Controller\allCategories;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class OutsideController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('allCategories/outside.html.twig', [
            'controller_name' => 'OutsideController',
        ]);
    }
}