<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class GeneralController extends Controller
{
    public function indexAction($name)
    {

        $session = $this->getRequest()->getSession();
        //$name = $session->get('name');
        $role = $session->get('role');

        $conn = $this->get('database_connection');


        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$name);


        return $this->render('LEAEtuBundle:Default:afficheInfosStage.html.twig',array(
            'name' => $name,
            'infos' => $infos,
            'role' =>$role,
        ));

        /*return $this->forward('LEAEtuBundle:Stage:afficherInfos',array(
           'name'
        ));*/
    }
}



