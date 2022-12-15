<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuizRepository;

class AfficheQuizController extends AbstractController
{
    #[Route('/affiche_quiz', name: 'app_affiche_quiz', methods: ['GET'])]
    public function index(QuizRepository $quiz): Response
    {
        return $this->render('affiche_quiz/index.html.twig', [
            'quiz' => $quiz->findAll(),
        ]);
    }}
