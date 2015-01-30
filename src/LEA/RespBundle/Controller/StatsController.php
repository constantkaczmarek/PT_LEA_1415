<?php

namespace LEA\RespBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class StatsController extends Controller
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

        return $this->render('LEARespBundle:Stats:index.html.twig');
    }
}