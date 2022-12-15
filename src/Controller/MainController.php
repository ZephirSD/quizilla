<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Quiz;

class MainController extends AbstractController
{
    #[Route('/app/{id}', name: 'app')]
    public function index(Quiz $quiz): Response
    {
        return $this->render('main/index.html.twig', [
            'quiz' => $quiz,
        ]);
    }
}
