<?php

namespace LEA\EtuBundle\Controller;

use LEA\EtuBundle\Entity\Bureau;
use LEA\EtuBundle\Entity\Entreprise;
use LEA\EtuBundle\Entity\infosStage;
use LEA\EtuBundle\Entity\Referent;
use LEA\EtuBundle\Form\BureauType;
use LEA\EtuBundle\Form\EntrepriseType;
use LEA\EtuBundle\Form\infosStageType;
use LEA\EtuBundle\Form\ReferentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class SoutenanceRapportController extends Controller
{

    public function indexAction()
    {

        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "STUD"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $nameEtu = $session->get('CK_USER');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$nameEtu);

        $query = $this->get('queries_sout');
        $date = new \DateTime();
        $year = $date->format('Y');
        $infos = $query->getDetailsSoutenanceEtu($conn,$nameEtu,2014);

        return $this->render('LEAEtuBundle:Default:soutenanceRapport.html.twig',array(
            'name' => $nameEtu,
            'infos' => $infos
        ));
    }


}
