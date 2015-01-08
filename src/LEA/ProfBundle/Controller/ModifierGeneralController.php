<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class ModifierGeneralController extends Controller
{
    public function indexAction($name,$nameEtu)
    {

        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$nameEtu);

        $role = $this->getRequest()->getSession()->get('role');

        return $this->render('LEAProfBundle:Default:afficheInfosStage.html.twig',array(
            'name' => $name,
            'infos' => $infos,
            'role' =>$role,
        ));
    }
}



