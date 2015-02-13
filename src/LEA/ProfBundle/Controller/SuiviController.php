<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SuiviController extends Controller
{
    public function indexAction()
    {
        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $name = $session->get('CK_USER');

        $queries = $this->get('queries_tuteur');
        $distance = $this->get('distance');
        $queriesForm = $this->get('queries');


        $etudiants = $queries->doTuteurQueryListChoices($conn, $name, 2014);

        $taille = count($etudiants);

        for($i = 0; $i< $taille ; $i++) {
            $etudiants[$i]['lienDistance'] = $distance->getLien($etudiants[$i]["bureauAd"] . " " . $etudiants[$i]["bureauCod"] . " " . $etudiants[$i]["ville"]);
        }

        $formation = $queriesForm->getTuteurFormationSuivi($conn,$name,2014);
        $form="M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA";


        return $this->render('LEAProfBundle:Default:suivi.html.twig', array(
            'name' => $name,
            'etudiants' => $etudiants,
            'page' => 'suivi',
            'listForm' => $formation,
            'aucune' => $form,
            'formation' => $session->get('formation'),
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));
    }

    public function supprAction()
    {
        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $name = $session->get('CK_USER');

        $request = $this->container->get('request');

        $queries = $this->get('queries_tuteur');

        $response = $queries->doDeleteChoixTuteurPourEtudiant($conn,$request->query->get('etudiant'), $name);

        return new JsonResponse(array("response"=>"ok"));
    }
}
