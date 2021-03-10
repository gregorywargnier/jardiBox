<?php

namespace App\Controller\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;


class CommitmentController extends AbstractController
{

    public function __invoke(): Response
    {
        return $this->render('services/ourCommitment.html.twig', [
            'controller_name' => 'CommitmentController',
        ]);
    }
}