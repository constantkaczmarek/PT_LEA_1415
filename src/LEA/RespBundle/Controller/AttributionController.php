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
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$gestionRole->hasRole($session, "RESP"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $name = $session->get('CK_USER');

        $selectForma = $session->get("FORMATIONS");
        $toutes = count($selectForma["keys"])-1;

        $conn = $this->get('database_connection');
        $formation = $session->get('formation');

        $queries = $this->get('queries');
        $listEtu = $queries->getEtudiantFormation($conn, $formation, $session->get('year'));
        $taille = count($listEtu);

        $dbutils = $this->get('dbutils');

        $form = $this->createFormBuilder(array('default'=>'default'));

        for($i = 0; $i< $taille ; $i++) {
            $tuteursPotentiels = $queries->getTuteursPotentiels($conn, $session->get("formation"),  $listEtu[$i]['alternanceCle'],  $session->get('year'));
            if(empty ($tuteursPotentiels)){
                $listEtu[$i]['tuteursPotentiel']['tuteurRef'] = "aucun";
            }
            else {
                $listEtu[$i]['tuteursPotentiel'] = $tuteursPotentiels[0];
            }
            $tuteursCandidats = $queries->getTuteursPotentielsParEtud($conn,$listEtu[$i]["etudRef"],2014);

            $tuteur = $queries->getTuteurEtud($conn, $listEtu[$i]["etudRef"],  $session->get('year'));
            $tuteurName = empty($tuteur)?null:$tuteur[0]["tuteurRef"];
            $listEtu[$i]["tuteurSelectionne"] = $tuteurName;

            if(!empty($tuteur))
                array_push($tuteursCandidats,$tuteur[0]);

            $listTuteur = $dbutils->convertArrayToChoices($tuteursCandidats,"tuteurRef","nom","prenom");
            $listTuteur["aucun"] = "aucun";

            if(count($listTuteur)>1) {

                $form->add($listEtu[$i]["alternanceCle"], 'choice', array(
                    'label' => false,
                    'choices' => $listTuteur,
                    'data' => $tuteurName,
                    'expanded' => true,
                    'multiple' => false));
            }
            if(!empty($tuteursCandidats)) {
                $listEtu[$i]["nb_prof"] = count($tuteursCandidats[0]);
            }else{
                $listEtu[$i]["nb_prof"] = 0;
            }
        }

        $form = $form->add('Enregistrer Choix','submit') ->getForm();

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->submit($request);

            if($form->isValid()) {
                $updateInfos = $this->get("update_queries");
                $infosEtu = $this->get("queries_etapes");
                $postData = current($request->request->all());
                $etudiants = array();


                foreach ($postData as $nom => $valeur){
                    if( $nom != "_token" && str_replace(CHR(32),"",$nom) != "EnregistrerChoix"){
                        $ok = $updateInfos->InscrireTuteur($conn,$nom,$valeur);
                        $etu = $infosEtu->getInfosEtud($conn,$nom);

                        $etudiants[$nom]=array(
                            "nom" => $etu["nom"],
                            "prenom" => $etu["prenom"],
                            "tuteur" => $valeur,
                            "ok" => $ok,
                        );
                    }
                }

                return $this->render('LEARespBundle:Default:enregistrerAttribution.html.twig', array(
                    'name' => $name,
                    'listEtu' => $etudiants,
                    'page' => 'attribution',
                    'resp'=> $gestionRole->hasRole($session, "RESP"),

                ));
            }
        }

        return $this->render('LEARespBundle:Default:attribution.html.twig', array(
            'name' => $name,
            'selectForma' => $selectForma,
            'listEtu' => $listEtu,
            'formation' => $formation,
            'form' => $form->createView(),
            'page' => 'attribution',
            'resp'=> $gestionRole->hasRole($session, "RESP"),
            'toutes' => $toutes
        ));

    }

    public function changeFormAction(){

        $request = $this->container->get('request');

        $session = $this->getRequest()->getSession();

        $session->set("formation",$request->query->get('formation'));

        return new JsonResponse(array("formation"=>$session->get('formation')));

    }
}
