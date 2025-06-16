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
        
        $multiplier = 12;

        $multiplication_facts = [];
        for ($i = 0; $i<=$multiplier; $i++){
          $multiplication_facts[$i] = random_int($selected, $multiplier);     
        }

        return $this->render('numbers/number.html.twig', [
            'selected' => $selected,
            'multiplication_facts' => $multiplication_facts,
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