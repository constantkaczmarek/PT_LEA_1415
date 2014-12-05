<?php

namespace LEA\EtuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $date = new \DateTime();
        $year = $date->format('Y');
        $tuteur = $queryEtu->doGetTuteurInfoForStudent($conn,$name,$year);
        $formation = $queryEtu->doGetFormationForStudent($conn, $name, $year);
        $refFormationType = substr($formation,strlen($formation)-2,2);

        // A DECOMMENTER EN VERSION FINALE, ET SUPPRIMER LES DEUX INITIALISATIONS A TRUE
        $missionSoutenance = (strcmp($formation, "M1MIAGEFA") !=0 && $refFormationType == "FA") ? true : false;
        $deuxiemeVisite = ($refFormationType == "FA") ? true : false;

        $missionSoutenance = true;
        $deuxiemeVisite = true;

        $tuteur = ($tuteur != null) ? $tuteur["prenom"] . " " . $tuteur["nom"] : "Aucun tuteur pour le moment";

        return $this->render('LEAEtuBundle:Default:index.html.twig', array(
            'name' => $name,
            'tuteur' => $tuteur,
            'missionSoutenance' => $missionSoutenance,
            'deuxiemeVisite' => $deuxiemeVisite,
        ));
    }
}
