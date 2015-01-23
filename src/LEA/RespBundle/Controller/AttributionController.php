<?php

namespace LEA\RespBundle\Controller;


use LEA\RespBundle\Entity\Attribution;
use LEA\RespBundle\Entity\ListAttributions;
use LEA\RespBundle\Form\AttributionType;
use LEA\RespBundle\Form\ListAttributionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;

class AttributionController extends Controller
{
    public function indexAction()
    {
        $session =$this->getRequest()->getSession();
        $name = $session->get('name');
        $role = $session->get('role');

        $selectForma = $this->get('html_utils')->getlistFormationSelect();

        $conn = $this->get('database_connection');
        $formation = $session->get('formation');

        $queries = $this->get('queries');
        $listEtu = $queries->getEtudiantFormation($conn, $formation, 2014);
        $taille = count($listEtu);

        $dbutils = $this->get('dbutils');

        $form = $this->createFormBuilder(array('default'=>'default'));

        for($i = 0; $i< $taille ; $i++) {
            $tuteursPotentiels = $queries->getTuteursPotentiels($conn, $session->get("formation"),  $listEtu[$i]['alternanceCle'], 2014);
            if(empty ($tuteursPotentiels)){
                $listEtu[$i]['tuteursPotentiel']['tuteurRef'] = "aucun";
            }
            else {
                $listEtu[$i]['tuteursPotentiel'] = $tuteursPotentiels[0];
            }
            $tuteursCandidats = $queries->getTuteursPotentielsParEtud($conn,$listEtu[$i]["etudRef"],2014);

            $listTuteur = $dbutils->convertArrayToChoices($tuteursCandidats,"tuteurRef","nom","prenom");
            $listTuteur["aucun"] = "aucun";

            $form->add($listEtu[$i]["alternanceCle"], 'choice', array(
                'label'=>false,
                'choices' => $listTuteur,
                'expanded'=>true,
                'multiple'=>false))
                ;

            $listAlt[$listEtu[$i]["alternanceCle"]] = $listEtu[$i]["alternanceCle"];
        }

        $form = $form->add('Enregistrer Choix','submit') ->getForm();
        //$form = $form->getForm();

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->submit($request);

            if($form->isValid()) {
                $updateInfos = $this->get("update_queries");
                $postData = current($request->request->all());

                foreach ($postData as $nom => $valeur){
                    if( $nom != "_token" && str_replace(CHR(32),"",$nom) != "EnregistrerChoix"){
                        $updateInfos->InscrireTuteur($conn,$nom,$valeur);
                    }
                }

                return $this->redirect(
                    $this->generateUrl('lea_resp_homepage',array(

                    ))
                );

            }
        }

        return $this->render('LEARespBundle:Default:attribution.html.twig', array(
            'name' => $name,
            'selectForma' => $selectForma,
            'listEtu' => $listEtu,
            'formation' => $formation,
            'form' => $form->createView()
        ));

    }

    public function changeFormAction(){

        $request = $this->container->get('request');

        $session = $this->getRequest()->getSession();

        $session->set("formation",$request->query->get('formation'));

        return new JsonResponse(array("formation"=>$session->get('formation')));

    }
}
