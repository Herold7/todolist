<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_page', methods:['GET'])]
    public function index(): Response
    {
        return $this->redirectToRoute('app_register');
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
    #[Route('/project/{id}', name: 'show_project', methods:['GET'])]
    public function showProject(
        Project $project
    ): Response
    {
        return $this->render('project/showproject.html.twig', [
            'project' => $project,
        ]);
    }

}
