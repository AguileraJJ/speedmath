<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Numbers extends AbstractController {

    #[Route('/')]
    public function index(): Response {

        return $this->render('base.html.twig', []);
    }

    #[Route('/multiplier', name: 'multiplier')]
    public function number(): Response {
        $selected = 8;
        
        $number = random_int(0, $selected);
        
        return $this->render('numbers/number.html.twig', [
            'number' => $number,
        ]);
    }

    #[Route('/lucky/number')]
    public function numbers(): Response
    {
        $number = random_int(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}