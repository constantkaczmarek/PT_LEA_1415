<?php

namespace LEA\EtuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $conn = $this->get('database_connection');

        $session = new Session();
        $session->set('role','etudiant');
        $session->set('etudiant','m1infofi1AA72');

        $nameEtu = $session->get('etudiant');

        $queryEtu = $this->get('queries_etu');
        $date = new \DateTime();
        $year = $date->format('Y');
        $tuteur = $queryEtu->doGetTuteurInfoForStudent($conn,$nameEtu,$year);
        $formation = $queryEtu->doGetFormationForStudent($conn, $nameEtu, $year);
        $refFormationType = substr($formation,strlen($formation)-2,2);

        // A DECOMMENTER EN VERSION FINALE, ET SUPPRIMER LES DEUX INITIALISATIONS A TRUE
        $missionSoutenance = (strcmp($formation, "M1MIAGEFA") !=0 && $refFormationType == "FA") ? true : false;
        $deuxiemeVisite = ($refFormationType == "FA") ? true : false;

        $missionSoutenance = true;
        $deuxiemeVisite = true;

        $tuteur = ($tuteur != null) ? $tuteur["prenom"] . " " . $tuteur["nom"] : "Aucun tuteur pour le moment";

        return $this->render('LEAEtuBundle:Default:index.html.twig', array(
            'name' => $nameEtu,
            'tuteur' => $tuteur,
            'missionSoutenance' => $missionSoutenance,
            'deuxiemeVisite' => $deuxiemeVisite,
        ));
    }
}
