<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product/list', name: 'product_list', methods: ['GET'])]
    public function list(): Response
    {
        return $this->render('products.html.twig');
    }
}
