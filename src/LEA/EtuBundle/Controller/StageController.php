<?php

namespace LEA\EtuBundle\Controller;

use LEA\EtuBundle\Entity\infosStage;
use LEA\EtuBundle\Form\infosStageType;
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
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name);

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$altRef);

        $dbQueries = $this->get('queries');
        $dbutils = $this->get('dbutils');

        $listEntr = $dbutils->convertArrayToChoices($dbQueries->getListeEntreprise($conn),"__sans entreprise__","SANS ENTREPRISE");
        $listBureau = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$infos[0]["entrCle"]),"bureauCle","ad");
        $listReferent = $dbutils->convertArrayToChoices($dbQueries->getListeReferent($conn,$infos[0]["entrCle"]),"keyRef","sans referent");

        $listBureauAlt = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$infos[0]["regieEntrCle"]),"bureauCle","ad");
        $listReferentAlt = $dbutils->convertArrayToChoices($dbQueries->getListeReferent($conn,$infos[0]["regieEntrCle"]),"keyRef","sans referent");

        $infosStage = new infosStage();

        $infosStage->setTel((int)$infos[0]["etuTel"]);
        $infosStage->setMail($infos[0]["etuMail"]);
        $infosStage->setMailLille1($infos[0]["etuMailLille1"]);
        $infosStage->setTuteur($infos[0]["profCle"]);
        $infosStage->setEntreprise($infos[0]["entrCle"]);
        $infosStage->setBureau($infos[0]["bureauRef"]);
        $infosStage->setReferent($infos[0]["refCle"]);
        $infosStage->setReferent1($infos[0]["ref1Cle"]);
        $infosStage->setDateContrat(new \DateTime($infos[0]["contratSignContrat"]));
        $infosStage->setDateDebutContrat(new \DateTime($infos[0]["contratDeb"]));
        $infosStage->setDateFinContrat(new \DateTime($infos[0]["contratFin"]));
        $infosStage->setEntrepriseAlt($infos[0]["regieEntrCle"]);
        $infosStage->setReferentAlt($infos[0]["regieReferentRef"]);
        $infosStage->setReferent1Alt($infos[0]["regieReferent1Ref"]);

        $form = $this->createForm(new infosStageType($infos,$listEntr,$listBureau,$listReferent,$listBureauAlt,$listReferentAlt),$infosStage);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosStage = $form->getData();
                $updateInfos = $this->get("update_queries");
                $updateInfos->updateInfosStage($conn,$infosStage,$altRef,$name);

                return $this->redirect(
                    $this->generateUrl('lea_etu_homepage',array(
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
        // Get the province ID
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
        // Get the province ID
        $regie = $request->query->get('regie');

        $conn = $this->get('database_connection');
        $dbQueries = $this->get('queries');
        $dbutils = $this->get('dbutils');

        $listBureau = $dbutils->convertArrayToChoices($dbQueries->getBureauEntreprise($conn,$regie),"bureauCle","ad");
        $listReferent = $dbutils->convertArrayToChoices($dbQueries->getListeReferent($conn,$regie),"keyRef","sans referent");

        return new JsonResponse(array('bureau'=> $listBureau, 'referent' => $listReferent));
    }


}
