<?php

namespace App\Controller\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class DeliveryretunsController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('services/DeliveryAndReturns.html.twig', [
            'controller_name' => 'DeliveryretunsController',
        ]);
    }
}