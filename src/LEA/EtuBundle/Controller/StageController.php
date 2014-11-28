<?php

namespace LEA\EtuBundle\Controller;

use LEA\EtuBundle\Entity\Bureau;
use LEA\EtuBundle\Entity\Entreprise;
use LEA\EtuBundle\Entity\infosStage;
use LEA\EtuBundle\Entity\Referent;
use LEA\EtuBundle\Form\BureauType;
use LEA\EtuBundle\Form\EntrepriseType;
use LEA\EtuBundle\Form\infosStageType;
use LEA\EtuBundle\Form\ReferentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class StageController extends Controller
{

    public function indexAction($name)
    {

        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name)["alternanceCle"];

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$altRef);

        $dbQueries = $this->get('queries');
        $dbutils = $this->get('dbutils');

        $listEntr = $dbutils->convertArrayToChoices($dbQueries->getListeEntreprise($conn),"__sans entreprise__","SANS ENTREPRISE");
        $listBureau = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$infos["entrCle"]),"bureauCle","ad");
        $listReferent = $dbutils->convertArrayToChoices($dbQueries->getListeReferent($conn,$infos["entrCle"]),"keyRef","sans referent");

        $listBureauAlt = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$infos["regieEntrCle"]),"bureauCle","ad");
        $listReferentAlt = $dbutils->convertArrayToChoices($dbQueries->getListeReferent($conn,$infos["regieEntrCle"]),"keyRef","sans referent");

        $infosStage = new infosStage();

        $infosStage->setTel((int)$infos["etuTel"]);
        $infosStage->setMail($infos["etuMail"]);
        $infosStage->setMailLille1($infos["etuMailLille1"]);
        $infosStage->setTuteur($infos["profCle"]);
        $infosStage->setEntreprise($infos["entrCle"]);
        $infosStage->setBureau($infos["bureauRef"]);
        $infosStage->setReferent($infos["refCle"]);
        $infosStage->setReferent1($infos["ref1Cle"]);
        $infosStage->setDateContrat(new \DateTime($infos["contratSignContrat"]));
        $infosStage->setDateDebutContrat(new \DateTime($infos["contratDeb"]));
        $infosStage->setDateFinContrat(new \DateTime($infos["contratFin"]));
        $infosStage->setEntrepriseAlt($infos["regieEntrCle"]);
        $infosStage->setBureauAlt($infos["regieBureauRef"]);
        $infosStage->setReferentAlt($infos["regieReferentRef"]);
        $infosStage->setReferent1Alt($infos["regieReferent1Ref"]);

        $form = $this->createForm(new infosStageType($infos,$listEntr,$listBureau,$listReferent,$listBureauAlt,$listReferentAlt),$infosStage);
        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosStage = $form->getData();
                $updateInfos = $this->get("update_queries");
                $updateInfos->updateInfosStage($conn,$infosStage,$altRef,$name);

                return $this->redirect(
                    $this->generateUrl('lea_etu_afficherInfosStage',array(
                        'name' => $name,
                    ))
                );
            }
        }

        return $this->render('LEAEtuBundle:Default:infosStage.html.twig',array(
            'form'=> $form->createView(),
            'infosStage' => $infosStage,
            'altref' => $altRef,
            'name' => $name
        ));
    }

    public function ajaxEntrAction() {

        $request = $this->container->get('request');
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }
        $entrCle = $request->query->get('entrCle');

        $conn = $this->get('database_connection');
        $dbQueries = $this->get('queries');
        $dbutils = $this->get('dbutils');

        $listBureau = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$entrCle),"bureauCle","ad");
        $listReferent = $dbutils->convertArrayToChoices($dbQueries->getListeReferent($conn,$entrCle),"keyRef","sans referent");

        return new JsonResponse(array('bureau'=> $listBureau, 'referent' => $listReferent));
    }

    public function ajaxRegieAction() {

        $request = $this->container->get('request');
        if (! $request->isXmlHttpRequest()) {
            throw new NotFoundHttpException();
        }
        $regie = $request->query->get('regie');

        $conn = $this->get('database_connection');
        $dbQueries = $this->get('queries');
        $dbutils = $this->get('dbutils');

        $listBureau = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$regie),"bureauCle","ad");
        $listReferent = $dbutils->convertArrayToChoices($dbQueries->getListeReferent($conn,$regie),"keyRef","sans referent");

        return new JsonResponse(array('bureau'=> $listBureau, 'referent' => $listReferent));
    }

    public function inscrireEntrAction($name){

        $conn = $this->get('database_connection');

        $entr = new Entreprise();
        $form = $this->createForm(new EntrepriseType(),$entr);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosEntr = $form->getData();
                $dist = $this->get("distance");
                $norm = $this->get("normaliser");
                $inscr = $this->get("inscrire");
                $inscr->inscrireEntr($conn,$infosEntr,$dist,$norm);

                return $this->redirect(
                    $this->generateUrl('lea_etu_infosStage',array(
                        'name' => $name,
                    ))
                );
            }
        }

        return $this->render('LEAEtuBundle:Default:InscrireEntreprise.html.twig',array(
            'form'=> $form->createView(),
            'name' => $name
        ));
    }

    public function inscrireBureauAction($name,$entr){

        $conn = $this->get('database_connection');

        $bur = new Bureau();
        $form = $this->createForm(new BureauType(),$bur);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosBur = $form->getData();
                $dist = $this->get("distance");
                $norm = $this->get("normaliser");
                $inscr = $this->get("inscrire");
                $inscr->inscrireBureau($conn,$infosBur,$dist,$norm,$entr);

                return $this->redirect(
                    $this->generateUrl('lea_etu_infosStage',array(
                        'name' => $name,
                    ))
                );
            }
        }

        return $this->render('LEAEtuBundle:Default:InscrireBureau.html.twig',array(
            'form'=> $form->createView(),
            'entr'=> $entr,
            'name' => $name
        ));
    }

    public function inscrireRefAction($name,$entr){

        $conn = $this->get('database_connection');

        $dbQueries = $this->get('queries');
        $dbutils = $this->get('dbutils');
        $norm = $this->get("normaliser");


        $listBureau = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$norm->genererCleEntrepriseAPartirDeNom($entr)),"bureauCle","ad");

        $ref = new Referent();
        $form = $this->createForm(new ReferentType($listBureau),$ref);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosRef = $form->getData();
                $dist = $this->get("distance");
                $inscr = $this->get("inscrire");
                $inscr->inscrireRef($conn,$infosRef,$dist,$norm,$entr);

                return $this->redirect(
                    $this->generateUrl('lea_etu_infosStage',array(
                        'name' => $name,
                    ))
                );
            }
        }

        return $this->render('LEAEtuBundle:Default:InscrireRef.html.twig',array(
            'form'=> $form->createView(),
            'entr' => $entr,
            'name' => $name
        ));
    }

    public function afficherInfosAction($name){

        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name)["alternanceCle"];

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$altRef);

        return $this->render('LEAEtuBundle:Default:afficheInfosStage.html.twig',array(
            'name' => $name,
            'infos' => $infos,
        ));

    }



    }
