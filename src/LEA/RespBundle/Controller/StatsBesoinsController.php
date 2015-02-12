<?php

namespace LEA\RespBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class StatsBesoinsController extends Controller
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
        $result = $stats->getBesoinsEncadrementEtudiants($conn, $formation, 2014);

        $totalEtudSansTuteur = 0;
        $totalEtudSansTuteurNiEntreprise = 0;
        foreach($result as $res)
        {
            $totalEtudSansTuteur += $res["nb"];
            $totalEtudSansTuteurNiEntreprise += $res["nbSans"];
        }

        return $this->render('LEARespBundle:Stats:besoins.html.twig',
            array(
                'listForm'  => $keysValues,
                'formation' => $formation,
                'result'    => $result,
                'totalEtudSansTuteur' => $totalEtudSansTuteur,
                'totalEtudSansTuteurNiEntreprise' => $totalEtudSansTuteurNiEntreprise,
                'page' => 'stats',
                'resp'=> $gestionRole->hasRole($session, "RESP"),
            ));
    }

}