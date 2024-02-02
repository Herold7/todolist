<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class PageController extends AbstractController
{
    #[Route('/', name: 'app_page', methods:['GET'])]
    public function index(AuthorizationCheckerInterface $authorizationChecker ): Response
    {
     // Vérifier si l'utilisateur est connecté
     if (!$authorizationChecker->isGranted('IS_AUTHENTICATED_FULLY')) {
        // Utilisateur non connecté, rediriger vers la page d'inscription
        return $this->redirectToRoute('app_login');
    }

    // Utilisateur connecté, rediriger vers le tableau de bord
    return $this->redirectToRoute('app_dashboard');
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
