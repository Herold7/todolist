<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_page', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('page/user-page.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
