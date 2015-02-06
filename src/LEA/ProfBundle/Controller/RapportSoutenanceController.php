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

        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $query = $this->get('queries');
        $tuteurRef = $session->get('CK_USER');


        $formationSuivi = $query->getFormationSuivieTuteur($conn, $tuteurRef, 2014,$onlyM1INFOFAnoParcours=true);

        $infosSoutenance = array();
        foreach($formationSuivi as $formation){
            array_push($infosSoutenance,$query->getDetailSoutenance($conn,$formation["formationCle"],2014)[0]);
        }

        return $this->render('LEAProfBundle:Default:rapportSoutenance.html.twig',array(
            'name' => $tuteurRef,
            'infosSoutenance' => $infosSoutenance,
            'formation' => $formationSuivi[0]['nom'],
            'page' => 'soutenanceProf'
        ));
    }
}



