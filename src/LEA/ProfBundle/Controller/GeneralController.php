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

        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$name);

        return $this->render('LEAEtuBundle:Default:afficheInfosStage.html.twig',array(
            'name' => $name,
            'infos' => $infos,
            'role' => "prof",
            'odm' => false,
        ));
    }
}



