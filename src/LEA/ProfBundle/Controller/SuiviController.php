<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SuiviController extends Controller
{
    public function indexAction()
    {
        $conn = $this->get('database_connection');

        $session = $this->getRequest()->getSession();
        $name=$session->get('name');

        $queries = $this->get('queries_tuteur');

        $etudiants = $queries->doTuteurQueryListChoices($conn, $name, 2014);

        return $this->render('LEAProfBundle:Default:suivi.html.twig', array(
            'name' => $name,
            'etudiants' => $etudiants,
        ));
    }

    public function supprAction()
    {
        $session = $this->getRequest()->getSession();
        $name=$session->get('name');

        $request = $this->container->get('request');

        $conn = $this->get('database_connection');

        $queries = $this->get('queries_tuteur');

        $response = $queries->doDeleteChoixTuteurPourEtudiant($conn,$request->query->get('etudiant'), $name);

        return new JsonResponse(array("response"=>"ok"));
    }
}
