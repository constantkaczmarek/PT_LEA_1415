<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class ODMController extends Controller
{
    public function indexAction($name)
    {

        $session = $this->getRequest()->getSession();
        //$name = $session->get('name');
        $role = $session->get('role');

        $odm = false;
        if($this->getRequest()->attributes->get('_route')=='lea_prof_odm');
            $odm = true;

        $conn = $this->get('database_connection');

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$name);

        return $this->render('LEAEtuBundle:Default:afficheInfosStage.html.twig',array(
            'name' => $name,
            'infos' => $infos,
            'role' =>$role,
            'odm' => $odm,
        ));

        /*return $this->forward('LEAEtuBundle:Stage:afficherInfos',array(
           'name'
        ));*/
    }

    public function creerAction($name){


        $session = $this->getRequest()->getSession();
        $conn = $this->get('database_connection');
        $query = $this->get('queries');
        $tuteurRef = $session->get('name');


        $formationSuivi = $query->getFormationSuivieTuteur($conn, $tuteurRef, 2014,$onlyM1INFOFAnoParcours=true);
        $infosSoutenance = $query->getDetailSoutenance($conn,$formationSuivi[0]["formationCle"],2014);

        return $this->render('LEAProfBundle:Default:creerODM.html.twig',array(
            'name' => $name,

        ));

    }

}



