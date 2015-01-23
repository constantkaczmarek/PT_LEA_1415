<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class EtuAttriSupprController extends Controller
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
        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $query = $this->get('update_queries');

        $query->profStopSuivi($conn, $name);

        return $this->redirect(
            $this->generateUrl('lea_prof_etuAttribues')
        );
    }

}