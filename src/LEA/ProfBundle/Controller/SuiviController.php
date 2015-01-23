<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class SuiviController extends Controller
{
    public function indexAction()
    {
        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $name = $session->get('CK_USER');

        $queries = $this->get('queries_tuteur');

        $etudiants = $queries->doTuteurQueryListChoices($conn, $name, 2014);

        return $this->render('LEAProfBundle:Default:suivi.html.twig', array(
            'name' => $name,
            'etudiants' => $etudiants,
        ));
    }

    public function supprAction()
    {
        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $name = $session->get('CK_USER');

        $request = $this->container->get('request');

        $queries = $this->get('queries_tuteur');

        $response = $queries->doDeleteChoixTuteurPourEtudiant($conn,$request->query->get('etudiant'), $name);

        return new JsonResponse(array("response"=>"ok"));
    }
}
