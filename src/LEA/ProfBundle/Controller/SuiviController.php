<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class SuiviController extends Controller
{
    public function indexAction($name)
    {
        $conn = $this->get('database_connection');

        $form="M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA";


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
