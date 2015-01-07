<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class RapportSoutenanceController extends Controller
{
    public function indexAction()
    {

        $session = $this->getRequest()->getSession();
        $conn = $this->get('database_connection');
        $query = $this->get('queries');
        $tuteurRef = $session->get('name');


        $formationSuivi = $query->getFormationSuivieTuteur($conn, $tuteurRef, 2014,$onlyM1INFOFAnoParcours=true);

        $infosSoutenance = array();
        foreach($formationSuivi as $formation){
            array_push($infosSoutenance,$query->getDetailSoutenance($conn,$formation["formationCle"],2014)[0]);
        }

        return $this->render('LEAProfBundle:Default:rapportSoutenance.html.twig',array(
            'name' => $tuteurRef,
            'infosSoutenance' => $infosSoutenance,
            'formation' => $formationSuivi[0]['nom']
        ));
    }
}



