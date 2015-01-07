<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class EtuAttribuesController extends Controller
{
    public function indexAction()
    {

        $session = $this->getRequest()->getSession();
        $name=$session->get('name');

        $actionCodes=array("aucune",
            "global",
            "etuGeneral",
            //"majEtape0",
            "renduEtape1_act",
            //"majEtape1",
            "renduEtape2_act",
            //"majEtape2",
            "renduEtapeMissionSoutenance_act",
            //"majEtapeMissionSoutenance",
            "renduEtapeBilan_act",
            "aucune",
            //"majEtapeBilan",
            "choixEtudiantGenerationOrdreMission_act",
            "aucune",
            "dissocierTuteur_act");
        $actionLabels=array("aucune",
            "Dossier global",
            "Informations générales",
            //"MAJ Informations générales sur les dossier",
            "Rencontre etudiant tuteur",
            //" - maj étape 1",
            "1ère visite pédagogique",
            //" - maj étape 2",
            "Mission soutenance (sauf M1 MIAGE FA)",
            //    " - maj étape Choix de la mission pour la soutenance (L3 et M2)",
            "2ème visite pédagogique",
            "------------",
            //    " - maj Bilan",
            "Génération ordre de mission",
            "------------",
            "Ne plus suivre cet étudiant"
        );

        $actions = array(
            'keys' => $actionCodes,
            'values' => $actionLabels
        );

        $form="M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA";

        $conn = $this->get('database_connection');
        $queries = $this->get('queries');

        $listEtu = $queries->getEtudByTuteur($conn, $session->get("formation"), $name, 2014);
        $formation = $queries->getTuteurFormationSuivi($conn,$name,2014);

        return $this->render('LEAProfBundle:Default:etuAttribues.html.twig', array(
            'name' => $name,
            'listEtu' => $listEtu,
            'formation' => $session->get('formation'),
            'listForm' => $formation,
            'aucune' => $form,
            'actions' => $actions
        ));
    }

}



