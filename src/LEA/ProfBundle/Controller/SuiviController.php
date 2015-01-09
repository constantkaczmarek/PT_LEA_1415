<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SuiviController extends Controller
{
    public function indexAction($name)
    {
        $conn = $this->get('database_connection');

        $queries = $this->get('queries_tuteur');

        $etudiants = $queries->doTuteurQueryListChoices($conn, $name, 2014);

        return $this->render('LEAProfBundle:Default:suivi.html.twig', array(
            'name' => $name,
            'etudiants' => $etudiants,
        ));
    }

    public function supprAction()
    {
        $request = $this->container->get('request');

        $conn = $this->get('database_connection');

        $queries = $this->get('queries_tuteur');

        $response = $queries->doDeleteChoixTuteurPourEtudiant($conn,$request->query->get('etudiant'),"bilasco");

        return new JsonResponse(array("response"=>"ok"));
    }
}
