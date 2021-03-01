<?php

namespace App\Controller\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class GiftcardController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('services/giftCard.html.twig', [
            'controller_name' => 'GiftcardController',
        ]);
    }
}