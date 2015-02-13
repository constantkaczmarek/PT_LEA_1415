<?php

namespace LEA\RoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class RedirectionController extends Controller
{
    public function indexAction()
    {
        $conn = $this->get('database_connection');

        $session = new Session();
        $session->start();
        //$session->set('CK_USER','m1infofi1AA72');
        //$session->set('CK_USER','marvie');
        $session->set('CK_USER','bilasco');
        //$session->set('CK_USER','marquet');

        $gestionRole = $this->get('gestion_role');

        $gestionRole->checkAllRoles($session, $conn);

        if($gestionRole->hasRole($session, "RESP"))
            return $this->redirect(
                $this->generateUrl('lea_resp_homepage'));

        if($gestionRole->hasRole($session, "PROF"))
            return $this->redirect(
                $this->generateUrl('lea_prof_homepage'));

        if($gestionRole->hasRole($session, "STUD"))
            return $this->redirect(
                $this->generateUrl('lea_etu_homepage'));
    }


}
