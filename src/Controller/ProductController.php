<?php

namespace App\Controller;

use App\Contracts\CreditProductProviderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    #[Route('/product/list', name: 'product_list', methods: ['GET'])]
    public function list(CreditProductProviderInterface $creditProductProvider): Response
    {
        $products = $creditProductProvider->getAll();
        return $this->render('products.html.twig', ['products' => $products]);
    }
}
