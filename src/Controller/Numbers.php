<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Numbers extends AbstractController {

    #[Route('/', name: 'app_index')]
    public function index(): Response {

        return $this->render('base.html.twig', []);
    }

    #[Route('/multiplier/{selected}', name: 'app_multiplier')]
    public function number(int $selected): Response {
        
        $number1 = random_int($selected, 12);
        $number2 = random_int($selected, 12);
        

        return $this->render('numbers/number.html.twig', [
            'number1' => $number1,
            'number2' => $number2,
        ]);
    }

    #[Route('/check-answer', name:'check_answer')]
    public function checkAnswer(Request $request) : Response {
        $userAnswer = $request->request->get('answer');
        $number1 = $request->request->get('number1');
        $number2 = $request->request->get('number2');

        $correctAnswer = $number1 * $number2;

        if ($userAnswer == $correctAnswer) {
            return new Response('Correct!');
        }

        return new Response('Wrong answer, try again!');
    }

}