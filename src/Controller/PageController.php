<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_page', methods:['GET'])]
    public function index(): Response
    {
        // Redirection vers la route 'app_home'
        return $this->redirectToRoute('app_home');
    }

    #[Route('/home', name: 'app_home', methods:['GET'])]
    public function home(): Response
    {
        return $this->render('page/home.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
    #[Route('/dashboard', name: 'app_dashboard', methods:['GET'])]
    public function dashboard(): Response
    {
        return $this->render('page/dashboard.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

}
