<?php

namespace LEA\ProfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class ChoisirController extends Controller
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

        $utils = $this->get('html_utils');
        $keysValues = $utils->getlistFormationSelect();

        $keysSansTuteur= array("OUI", "NON", "EXCL", "ENTR");
        $valuesSansTuteur = array("tous les étudiants",
            "les étudiants sans tuteurs potentiels",
            "les étudiants sans tuteur retenu",
            "les étudiants ayant trouvé une entreprise");

        $sanstuteur = array(
           'keys' =>$keysSansTuteur,
            'values'=> $valuesSansTuteur
        );

        $conn = $this->get('database_connection');
        $queries = $this->get('queries');
        $distance = $this->get('distance');

        $listEtu = $queries->getEtudiantFormation($conn,$session->get("formation"),2014);
        $taille = count($listEtu);
        $listAlt=array();


        for($i = 0; $i< $taille ; $i++) {
            $listEtu[$i]['lienDistance'] = $distance->getLien($listEtu[$i]["bureauAd"]." ".$listEtu[$i]["bureauCod"]." ".$listEtu[$i]["ville"]);
            $tuteurs = $queries->getTuteursPotentiels($conn, $session->get("formation"),  $listEtu[$i]['alternanceCle'], 2014);
            if(empty ($tuteurs)){
                $listEtu[$i]['tuteurs']['tuteurRef'] = "aucun";
            }
            else {
                $listEtu[$i]['tuteurs'] = $tuteurs[0];
            }
            $listAlt[$listEtu[$i]["alternanceCle"]] = $listEtu[$i]["alternanceCle"];
        }

        $choix = new ChoixSansTuteur();
        $choix->setTuteurRef($name);

        $form = $this->createForm(new ChoixSansTuteurType($listAlt),$choix);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $choix->setAltCle($form->getData()->getAltCle()[0]);

                $updateInfos = $this->get("update_queries");
                $updateInfos->enregChoixTuteur($conn,$form->getData());

                return $this->redirect(
                    $this->generateUrl('lea_prof_homepage',array(
                        'name' => $name,
                    ))
                );
            }
        }

        return $this->render('LEAProfBundle:Default:choisir.html.twig', array(
            'name' => $name,
            'listEtu' => $listEtu,
            'form' => $form->createView(),
            'listForm' => $keysValues,
            'formation' => $session->get('formation'),
            'choixTuteur' => $sanstuteur,
            'situation' => $session->get('sanstuteur'),
            'page'=>'choisir'
        ));
    }

    public function changeFormAction(){

        $request = $this->container->get('request');

        $session = $this->getRequest()->getSession();

        if(!empty($request->query->get('situ'))){
            $session->set("sanstuteur",$request->query->get('situ'));
        }else{
            $session->set("formation",$request->query->get('formation'));
        }

        return new JsonResponse(array("formation"=>$session->get('formation')));

    }
}



