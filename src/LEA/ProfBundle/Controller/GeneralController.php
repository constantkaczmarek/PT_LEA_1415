<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class GeneralController extends Controller
{
    public function indexAction($name,$nameEtu)
    {

        $conn = $this->get('database_connection');


        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$nameEtu);

        $role = $this->getRequest()->getSession()->get('role');

        return $this->render('LEAEtuBundle:Default:afficheInfosStage.html.twig',array(
            'name' => $name,
            'nameEtu' => $nameEtu,
            'infos' => $infos,
            'role' =>$role,
        ));

        /*return $this->forward('LEAEtuBundle:Stage:afficherInfos',array(
           'name'
        ));*/
    }
}



