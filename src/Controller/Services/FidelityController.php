<?php

namespace App\Controller\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class FidelityController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('services/fidelity.html.twig', [
            'controller_name' => 'FidelityController',
        ]);
    }
}