<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Numbers extends AbstractController
{
    #[Route('/')]
    public function number(): Response
    {
        
        $number1 = random_int(0, 12);
        $number2 = random_int(0, 12);

        return $this->render('numbers/number.html.twig', [
            'number1' => $number1,
            'number2' => $number2,
        ]);
    }

    public function multiplication($num1,$num2) {
        return $num1*$num2;
    }
}