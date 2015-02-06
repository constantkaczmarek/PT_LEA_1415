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

        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $name=$session->get('CK_USER');

        $actionCodes=array("aucune",
            "global",
            "etuGeneral",
            //"majEtape0",
            "etuRencontre",
            //"majEtape1",
            "etuVisiteUn",
            "etuMissionSoutenance",
            "etuVisiteDeux",
            "aucune",
            "odm",
            "aucune",
            "etuSuppr");
        $actionLabels=array("aucune",
            "Dossier global",
            "Informations générales",
            "Rencontre etudiant tuteur",
            "1ère visite pédagogique",
            "Mission soutenance (sauf M1 MIAGE FA)",
            "2ème visite pédagogique",
            "------------",
            "Génération ordre de mission",
            "------------",
            "Ne plus suivre cet étudiant"
        );

        $actions = array(
            'keys' => $actionCodes,
            'values' => $actionLabels
        );

        $form="M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA";

        $queries = $this->get('queries');

        $listEtu = $queries->getEtudByTuteur($conn, $session->get("formation"), $name, 2014);
        $formation = $queries->getTuteurFormationSuivi($conn,$name,2014);

        return $this->render('LEAProfBundle:Default:etuAttribues.html.twig', array(
            'name' => $name,
            'listEtu' => $listEtu,
            'formation' => $session->get('formation'),
            'listForm' => $formation,
            'aucune' => $form,
            'actions' => $actions,
            'page'=> 'etu_attribues'
        ));
    }

}



