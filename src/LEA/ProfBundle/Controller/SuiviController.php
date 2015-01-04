<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class SuiviController extends Controller
{
    public function indexAction($name)
    {
        $conn = $this->get('database_connection');
        $queries = $this->get('queries_tuteur');

        $etudiants = $queries->doTuteurQueryListChoices($conn, $name, 2014);

        return $this->render('LEAProfBundle:Default:suivi.html.twig', array(
            'name' => $name,
            'etudiants' => $etudiants,
        ));
    }
}
