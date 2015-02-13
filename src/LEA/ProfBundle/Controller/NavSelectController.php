<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class NavSelectController extends Controller
{
    public function indexAction()
    {
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        $name = $session->get('CK_USER');

        $keys = array("FA","FI","FA_FI");
        $values = array("Alternance","Stages","Alt./Stages");

        $formation = $session->get('formation');

        $types = array(
            'keys' =>$keys,
            'values'=> $values
        );

        $listYears = $this->get('html_utils')->getAvailableYears();

        return $this->render('LEAProfBundle:Default:navselect.html.twig', array(
            'name' => $name,
            'typeSelect'=>$types,
            'type'=>$session->get('typeSuivi'),
            'listYears' =>$listYears,
            'year' => $session->get('year'),
            'resp'=> $gestionRole->hasRole($session, "RESP"),
            'etu' => $gestionRole->hasRole($session, "STUD")
            ));
    }

    public function changeFormGlobalAction(){
        $request = $this->container->get('request');
        $session = $this->getRequest()->getSession();

        if(!empty($request->query->get('suivi'))){
            $session->set("suivi",$request->query->get('suivi'));
        }else if(!empty($request->query->get('formation'))){
            $session->set("formation",$request->query->get('formation'));
        }else{
            $session->set("year",$request->query->get('year'));
        }
        return new JsonResponse(array("formation"=>$session->get('formation')));
    }

}
