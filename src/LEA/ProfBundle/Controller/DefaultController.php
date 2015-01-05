<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        $session = new Session();
        $session->start();

        $session->set('formation', 'M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA');
        $session->set('sanstuteur','EXCL');
        $session->set('role',"prof");

        return $this->render('LEAProfBundle:Default:index.html.twig', array('name' => $name));
    }
}
