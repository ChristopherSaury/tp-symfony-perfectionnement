<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaticPageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function homePage(): Response
    {
        return $this->render('static_page/accueil.html.twig', [
            'controller_name' => 'StaticPageController',
        ]);
    }

    #[Route('/cgu', name: 'terms_of_use')]
    public function cgu(): Response
    {
        return $this->render('static_page/cgu.html.twig', [
            'controller_name' => 'StaticPageController',
        ]);
    }
}
