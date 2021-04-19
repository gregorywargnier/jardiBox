<?php

namespace App\Controller;

use App\Repository\UniverseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    public function __invoke(UniverseRepository $universeRepo): Response
    {
        $universe = $universeRepo->findAll();
        return $this->render('home/index.html.twig', [
            'universe' => $universe,
        ]);
    }
}
