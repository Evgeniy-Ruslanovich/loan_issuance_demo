<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    #[Route('/random/{max}', name: 'random')]
    public function random(int $max): Response
    {
        $number = random_int(0, $max);

        return $this->render('base.html.twig', [
            'number' => $number,
        ]);
    }
}
