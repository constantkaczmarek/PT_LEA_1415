<?php

namespace LEA\RespBundle\Controller;


use LEA\RespBundle\Entity\Attribution;
use LEA\RespBundle\Entity\InfosSoutenanceRapport;
use LEA\RespBundle\Entity\ListAttributions;
use LEA\RespBundle\Form\AttributionType;
use LEA\RespBundle\Form\InfosSoutenanceRapportType;
use LEA\RespBundle\Form\ListAttributionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;

class SoutenanceController extends Controller
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
        $role = $session->get('role');
        $formation = $session->get('formation');

        $conn = $this->get('database_connection');

        $dbutils = $this->get('dbutils');
        $query = $this->get('queries');

        $queriesSout = $this->get('queries_sout');

        $all = "M1MIAGEFA M2MIAGEFA M2IPINTFA M1INFOFA M2IAGLFA M2ESERVFA M2TIIRFA M2IVIFA M2MOCADFA M1MIAGEFI M2MIAGEFI M1INFOFI M2IAGLFI M2ESERVFI M2TIIRFI M2IVIFI M2MOCADFI";
        $listFormation =  $queriesSout->getSoutenancesResponsable($conn,$session->get('CK_ROLES'), $session->get('year'));

        $infosSoutenance = array();

        foreach($listFormation as $formation){
            $detailSout = $query->getDetailSoutenance($conn,$formation["formationCle"], $session->get('year'));
            if(!empty($detailSout)) {
                array_push($infosSoutenance, $detailSout[0]);
            }else {
                array_push($infosSoutenance, array(
                    "formationRef" => $formation["formationCle"],
                    "datesSoutenances" => " ",
                    "dateRemise" => " ",
                    "longueurRapport" => " ",
                    "dureeSoutenance" => " ",
                    "observationsTous" => " ",
                    "observationsTuteurs" => " ",
                    "lienExterne" => " ",
                ));
            }
        }

        return $this->render('LEARespBundle:Default:soutenance.html.twig', array(
            'name' => $name,
            'infosSoutenance' => $infosSoutenance,
            'role' => $role,
            'page' => 'soutenanceResp',
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));

    }

    public function editAction($forma)
    {
        $session =$this->getRequest()->getSession();
        $gestionRole = $this->get('gestion_role');

        $name = $session->get('name');
        $role = $session->get('role');
        $formation = $session->get('formation');

        $conn = $this->get('database_connection');
        $query = $this->get('queries');

        $detailSout = $query->getDetailSoutenance($conn,$forma,2014)[0];

        //print_r($detailSout);

        $infosSout = new InfosSoutenanceRapport();
        $infosSout->setFormationRef($forma);
        $infosSout->setDatesSoutenances($detailSout["datesSoutenances"]);
        $infosSout->setDateRemise($detailSout["dateRemise"]);
        $infosSout->setLongueurRapport($detailSout["longueurRapport"]);
        $infosSout->setDureeSoutenance($detailSout["dureeSoutenance"]);
        $infosSout->setObservationsTous($detailSout["observationsTous"]);
        $infosSout->setObservationsTuteurs($detailSout["observationsTuteurs"]);
        $infosSout->setLienExterne($detailSout["lienExterne"]);

        $form = $this->createForm(new InfosSoutenanceRapportType(),$infosSout);

        $request = $this->getRequest();

        if($request->isMethod('POST')){
            $form->bind($request);

            if($form->isValid()){

                $infosSout = $form->getData();
                $updateInfos = $this->get("update_queries");
                $updateInfos->updateSoutenanceRapport($conn,$infosSout, $session->get('year'));

            }
        }

        return $this->render('LEARespBundle:Default:modifierSoutenance.html.twig', array(
            'name' => $name,
            'forma' => $forma,
            'form' => $form->createView(),
            'role' => $role,
            'page' => 'soutenanceResp',
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));


    }
}
