<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Numbers extends AbstractController {

    #[Route('/', name: 'app_index')]
    public function index(): Response {

        return $this->render('base.html.twig', []);
    }

    #[Route('/multiplier', name: 'app_multiplier')]
    public function number(): Response {
        $selected = 8;
        
        $number = random_int(0, $selected);
        
        return $this->render('numbers/number.html.twig', [
            'number' => $number,
        ]);
    }

}