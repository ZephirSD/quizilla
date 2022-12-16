<?php

namespace App\Controller;

use App\Entity\Reponses;
use App\Entity\ResponsesClient;
use App\Repository\ResponsesClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use App\Entity\ResponsesClient;
// use App\Repository\ResponsesClientRepository;

class ClientReponseController extends AbstractController
{
    #[Route('/client/reponse', name: 'app_client_reponse', methods: 'POST')]
    public function index(Request $request, ResponsesClientRepository $repoClient): Response
    {
        $reponseClient = $request->request->all();
        // dump($reponseClient);
        $rpc = new ResponsesClient();
        $repsC = new Reponses();
        foreach ($reponseClient as $valueRepo) {
            dump($valueRepo);
            $repsC->getIdClient(intval($valueRepo));
            $rpc->setIdReponse($repsC);
            dump($rpc);
            $repoClient->save($rpc, true);
        }
        // return $this->redirectToRoute('app_affiche_quiz', [], Response::HTTP_SEE_OTHER);
    }
}
