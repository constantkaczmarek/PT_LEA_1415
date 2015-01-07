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

        $session = $this->getRequest()->getSession();

        $name = $session->get('name');

        $keysValues=array();
        $keysValues["keys"]=array();
        $keyValues["values"]=array();

        $keysValues["keys"][]="M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA";
        $keysValues["values"][]="== Toutes FA ==";

        $keysValues["keys"][]="M1MIAGEFA,M2MIAGEFA, M2IPINTFA";
        $keysValues["values"][]="MIAGE - M1  M2 FA";

        $keysValues["keys"][]="M1MIAGEFA";
        $keysValues["values"][]=" - MIAGE - M1 FA";
        $keysValues["keys"][]="M2MIAGEFA";
        $keysValues["values"][]=" - MIAGE - M2 FA";
        $keysValues["keys"][]="M2IPINTFA";
        $keysValues["values"][]=" - IPINT - M2 FA";

        $keysValues["keys"][]="M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA";
        $keysValues["values"][]="INFO - M1  M2 FA";

        $keysValues["keys"][]="M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA";
        $keysValues["values"][]="INFO - M1 FA";

        $keysValues["keys"][]="M1ESERVFA";
        $keysValues["values"][]=" - ESERV - M1 FA";

        $keysValues["keys"][]="M1IAGLFA";
        $keysValues["values"][]=" - IAGL - M1 FA";

        $keysValues["keys"][]="M1IVIFA";$keysValues["values"][]=" - IVI - M1 FA";
        $keysValues["keys"][]="M1MOCADFA";$keysValues["values"][]=" - MOCAD - M1 FA";
        $keysValues["keys"][]="M1TIIRFA";$keysValues["values"][]=" - TIIR - M1 FA";
        $keysValues["keys"][]="M1INFOFI";$keysValues["values"][]=" - Sans Spec - M1 FA";
        $keysValues["keys"][]="M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA";$keysValues["values"][]="INFO - M2 FA";
        $keysValues["keys"][]="M2ESERVFA";$keysValues["values"][]=" - ESERV - M2 FA";
        $keysValues["keys"][]="M2IAGLFA";$keysValues["values"][]=" - IAGL - M2 FA";
        $keysValues["keys"][]="M2IVIFA";$keysValues["values"][]=" - IVI - M2 FA";
        $keysValues["keys"][]="M2MOCADFA";$keysValues["values"][]=" - MOCAD - M2 FA";
        $keysValues["keys"][]="M2TIIRFA";$keysValues["values"][]=" - TIIR - M2 FA";

        $keysValues["keys"][]="L3MIAGEFI,M1MIAGEFI,M2MIAGEFI,M1MIAGEFI,M2MIAGEFI,L3INFOFI,M1INFOFI,M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI,M1INFOFI,M1IAGLFI,M1ESERVFI,M1TIIRFI,M1IVIFI,M1MOCADFI,M1ESERVFI,M1IAGLFI,M1IVIFI,M1MOCADFI,M1TIIRFI,M1INFOFI,M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI,M2ESERVFI,M2IAGLFI,M2IVIFI,M2MOCADFI,M2TIIRFI";
        $keysValues["values"][]="== Toutes FI ==";
        $keysValues["keys"][]="L3MIAGEFI";$keysValues["values"][]=" - MIAGE - L3 FI";
        $keysValues["keys"][]="M1MIAGEFI,M2MIAGEFI";$keysValues["values"][]="MIAGE - M1 M2 FI";
        $keysValues["keys"][]="M1MIAGEFI";$keysValues["values"][]=" - MIAGE - M1 FI";
        $keysValues["keys"][]="M2MIAGEFI";$keysValues["values"][]=" - MIAGE - M2 FI";
        $keysValues["keys"][]="L3INFOFI";$keysValues["values"][]="L3 INFO FI";
        $keysValues["keys"][]="M1INFOFI,M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI";$keysValues["values"][]="INFO - M1 M2 FI";
        $keysValues["keys"][]="M1INFOFI,M1IAGLFI,M1ESERVFI,M1TIIRFI,M1IVIFI,M1MOCADFI";$keysValues["values"][]="INFO - M1 FI";
        $keysValues["keys"][]="M1ESERVFI";$keysValues["values"][]=" - ESERV - M1 FI";
        $keysValues["keys"][]="M1IAGLFI";$keysValues["values"][]=" - IAGL - M1 FI";
        $keysValues["keys"][]="M1IVIFI";$keysValues["values"][]=" - IVI - M1 FI";
        $keysValues["keys"][]="M1MOCADFI";$keysValues["values"][]=" - MOCAD - M1 FI";
        $keysValues["keys"][]="M1TIIRFI";$keysValues["values"][]=" - TIIR - M1 FI";
        $keysValues["keys"][]="M1INFOFI";$keysValues["values"][]=" - Sans Spec - M1 FI";
        $keysValues["keys"][]="M2IAGLFI,M2ESERVFI,M2TIIRFI,M2IVIFI,M2MOCADFI";$keysValues["values"][]="INFO - M2 FI";
        $keysValues["keys"][]="M2ESERVFI";$keysValues["values"][]=" - ESERV - M2 FI";
        $keysValues["keys"][]="M2IAGLFI";$keysValues["values"][]=" - IAGL - M2 FI";
        $keysValues["keys"][]="M2IVIFI";$keysValues["values"][]=" - IVI - M2 FI";
        $keysValues["keys"][]="M2MOCADFI";$keysValues["values"][]=" - MOCAD - M2 FI";
        $keysValues["keys"][]="M2TIIRFI";$keysValues["values"][]=" - TIIR - M2 FI";


        $keysSansTuteur= array("OUI", "NON", "EXCL", "ENTR");
        $valuesSansTuteur = array("tous les étudiants",
            "les étudiants sans tuteurs potentiels",
            "les étudiants sans tuteur retenu",
            "les étudiants ayant trouvé une entreprise");

        $sanstuteur = array(
           'keys' =>$keysSansTuteur,
            'values'=> $valuesSansTuteur
        );

        //print_r($sanstuteur);

        //print_r($keysValues);

        //$form["keys"][]
        //$form="M1MIAGEFA,M2MIAGEFA, M2IPINTFA,M1MIAGEFA,M2MIAGEFA,M2IPINTFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M1INFOFI,M1IAGLFA,M1ESERVFA,M1TIIRFA,M1IVIFA,M1MOCADFA,M1ESERVFA,M1IAGLFA,M1IVIFA,M1MOCADFA,M1TIIRFA,M1INFOFI,M2IAGLFA,M2ESERVFA,M2TIIRFA,M2IVIFA,M2MOCADFA,M2ESERVFA,M2IAGLFA,M2IVIFA,M2MOCADFA,M2TIIRFA";

        $conn = $this->get('database_connection');
        $queries = $this->get('queries');
        $distance = $this->get('distance');

        //print_r($session->get("formation"));
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

       /* $listExcl = array();

        for($i = 0; $i< $taille ; $i++) {
            $tuteurs = $queries->getTuteursPotentiels($conn, $session->get("formation"),  $listEtu[$i]['alternanceCle'], 2014);
            if(empty ($tuteurs)){
                $listEtu[$i]['tuteurs']['tuteurRef'] = "aucun";
                if($session->get("sanstuteur")=="EXCL"){
                    array_push($listExcl,$listEtu[$i]);
                }
            }
            else {
                $listEtu[$i]['tuteurs'] = $tuteurs[0];
            }
        }

        $listAlt=array();
        if($session->get("sanstuteur")=="EXCL"){
            $listTri = $listExcl;
        }else
            $listTri = $listEtu;

        $taille = count($listTri);
        for($i = 0; $i< $taille ; $i++){
            $listAlt[$listTri[$i]["alternanceCle"]] = $listTri[$i]["alternanceCle"];
        }*/



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



