<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    // on définit le chemin qui mathc avec ce controlleur
    // le premier argument est le path utiliser 
    // le second est le nom de la route qui permet d'y faire référence pour créer des liens.
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return new Response('<html>
            <body>
                <img src="/images/under-construction.gif" />
            </body>
        </html>');
    }
}
