<?php

namespace LEA\RespBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class StatsFormController extends Controller
{

    public function indexAction()
    {
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "RESP"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $utils = $this->get('html_utils');
        $keysValues = $utils->getlistFormationSelect();

        $conn = $this->get('database_connection');
        $formation = $session->get('formation');

        $stats = $this->get('stats');
        $result = $stats->getEtudiantsParFormation($conn, $formation, $session->get('year'));

        $totalEtud = 0;
        $totalEtudSansTuteur = 0;
        foreach($result as $res)
        {
            $totalEtud += $res["nb"];
            $totalEtudSansTuteur += $res["nbSans"];
        }

        return $this->render('LEARespBundle:Stats:form.html.twig',
            array(
                'listForm'  => $keysValues,
                'formation' => $formation,
                'result'    => $result,
                'nbForm'    => sizeof($result),
                'totalEtud' => $totalEtud,
                'totalEtudSansTuteur' => $totalEtudSansTuteur,
                'page' => 'stats',
                'resp'=> $gestionRole->hasRole($session, "RESP"),
            ));
    }

}