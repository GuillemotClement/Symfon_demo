<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    // on définit le chemin qui mathc avec ce controlleur
    // le premier argument est le path utiliser 
    // le second est le nom de la route qui permet d'y faire référence pour créer des liens.
    #[Route('/hello/{name}', name: 'homepage')]
    public function index(string $name = '', Request $request): Response
    {
        $greet = '';
        if($name){
            $greet = sprintf('<h1>Hello %s!</h1>', htmlspecialchars($name));
        }

        dump($request);

        return new Response('<html>
            <body>
                $greet
                <img src="/images/under-construction.gif" />
            </body>
        </html>');
    }
}
