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
        $formationType=($refFormationType=="FA")?"alternance":"stage";

        if($tuteur != null) {
            $tuteur = $tuteur["prenom"] . " " . $tuteur["nom"];
        }
        else $tuteur = "Aucun tuteur pour le moment";

        return $this->render('LEAEtuBundle:Default:index.html.twig', array(
            'name' => $name,
            'tuteur' => $tuteur,
            'formationType' => $formationType,
        ));
    }
}
