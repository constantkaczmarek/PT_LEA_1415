<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $name = $session->get('CK_USER');

        $session->set('formation', 'M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA');
        $session->set('sanstuteur','EXCL');

        return $this->render('LEAProfBundle:Default:index.html.twig', array('name' => $name,'page'=>'index','resp'=> $gestionRole->hasRole($session, "RESP")));
    }

    public function changeGlobalFormationAction(){
        $request = $this->container->get('request');
        $session = $this->getRequest()->getSession();
        $session->set("formation",$request->query->get('formation'));
        return new JsonResponse(array("formation"=>$session->get('formation')));
    }

    public function changeGlobalAnneeAction(){
        $request = $this->container->get('request');
        $session = $this->getRequest()->getSession();
        $session->set("year",$request->query->get('year'));

        return new JsonResponse(array("year"=>$session->get('year')));
    }
}
