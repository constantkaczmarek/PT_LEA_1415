<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class EtuAttriSupprController extends Controller
{
    public function indexAction($name)
    {
        $query = $this->get('queries_etapes');
        $conn = $this->get('database_connection');
        $infos = $query->getInfosEtud($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];

        return $this->render('LEAProfBundle:Default:etuAttriSuppr.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'post' => false,
        ));

    }

    public function supprAction($name)
    {
        $query = $this->get('update_queries');
        $conn = $this->get('database_connection');

        $query->profStopSuivi($conn, $name);

        return $this->redirect(
            $this->generateUrl('lea_prof_etuAttribues')
        );
    }

}