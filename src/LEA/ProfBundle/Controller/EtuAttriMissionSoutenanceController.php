<?php

namespace LEA\ProfBundle\Controller;

use LEA\ProfBundle\Entity\MissionSoutenance;
use LEA\ProfBundle\Form\MissionSoutenanceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class EtuAttriMissionSoutenanceController extends Controller
{
    public function indexAction($name)
    {
        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $query = $this->get('queries_etapes');
        $infos = $query->getMissionSoutenance($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
        $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
        $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
        $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";

        return $this->render('LEAProfBundle:Default:etuAttriMissionSoutenance.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'post' => false,
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));

    }

    public function renduAction($name)
    {
        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }

        $query = $this->get('queries_etapes');
        $infos = $query->getMissionSoutenance($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];

        $etuMissionSoutenance = new MissionSoutenance();
        $etuMissionSoutenance->setDateRencontre($infos['dateRencontre']);
        $etuMissionSoutenance->setTypeRencontre($infos['typeRencontre']);
        $etuMissionSoutenance->setDateValidation($infos['dateValidation']);
        $etuMissionSoutenance->setEnvironnementTechnique($infos['environnementTechnique']);
        $etuMissionSoutenance->setMissions($infos['missions']);
        $etuMissionSoutenance->setEnjeux($infos['enjeux']);
        $etuMissionSoutenance->setSignatureTuteur($infos['signatureTuteur'] != 0 ? true : false);
        $etuMissionSoutenance->setRemarquesTuteur($infos['remarquesTuteur']);
        $etuMissionSoutenance->setSignatureReferent($infos['signatureReferent'] != 0 ? true : false);
        $etuMissionSoutenance->setRemarquesReferent($infos['remarquesReferent']);

        $form = $this->createForm(new MissionSoutenanceType(), $etuMissionSoutenance);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $MissionSoutenance = $form->getData();

                $updateInfos = $this->get("update_queries");
                $updateInfos->profUpdateMissionSoutenance($conn, $MissionSoutenance, $name);

                $infos = $query->getMissionSoutenance($conn,$name);

                $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
                $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
                $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
                $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";

                return $this->render('LEAProfBundle:Default:etuAttriMissionSoutenance.html.twig', array(
                    'infos' => $infos,
                    'name'  => $name,
                    'post' => true,
                ));
            }
        }
        return $this->render('LEAProfBundle:Default:etuAttriMissionSoutenanceEdit.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'form'  => $form->createView(),
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));
    }

}