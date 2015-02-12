<?php

namespace LEA\ProfBundle\Controller;

use LEA\ProfBundle\Entity\VisiteUn;
use LEA\ProfBundle\Form\VisiteUnType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class EtuAttriVisiteUnController extends Controller
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
        $infos = $query->getVisiteUn($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
        $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
        $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
        $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";

        return $this->render('LEAProfBundle:Default:etuAttriVisiteUn.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'post' => false,
            'resp'=> $gestionRole->hasRole($session, "RESP"),
            'page'=> 'etu_attribues',
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

        $infos = $query->getVisiteUn($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];

        $etuVisiteUn = new VisiteUn();
        $etuVisiteUn->setDateRencontre($infos['dateRencontre']);
        $etuVisiteUn->setAdequationMission($infos['adequationMission']);
        $etuVisiteUn->setIntegrationEtudiant($infos['integrationEtudiant']);
        $etuVisiteUn->setSignatureTuteur($infos['signatureTuteur'] != 0 ? true : false);
        $etuVisiteUn->setRemarquesTuteur($infos['remarquesTuteur']);
        $etuVisiteUn->setSignatureReferent($infos['signatureReferent'] != 0 ? true : false);
        $etuVisiteUn->setRemarquesReferent($infos['remarquesReferent']);

        $form = $this->createForm(new VisiteUnType(), $etuVisiteUn);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $visiteUn = $form->getData();

                $updateInfos = $this->get("update_queries");
                $updateInfos->profUpdateVisiteUn($conn, $visiteUn, $name);

                $infos = $query->getVisiteUn($conn,$name);

                $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
                $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
                $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
                $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";

                return $this->render('LEAProfBundle:Default:etuAttriVisiteUn.html.twig', array(
                    'infos' => $infos,
                    'name'  => $name,
                    'post' => true,
                    'resp'=> $gestionRole->hasRole($session, "PROF"),
                ));
            }
        }
        return $this->render('LEAProfBundle:Default:etuAttriVisiteUnEdit.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'form'  => $form->createView(),
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));
    }

}