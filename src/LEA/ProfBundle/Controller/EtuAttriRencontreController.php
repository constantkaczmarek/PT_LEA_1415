<?php

namespace LEA\ProfBundle\Controller;

use LEA\ProfBundle\Entity\RencontreEtu;
use LEA\ProfBundle\Form\RencontreEtuType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class EtuAttriRencontreController extends Controller
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
        $infos = $query->getRencontreTuteur($conn,$name);
        
        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
        $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
        $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";

        return $this->render('LEAProfBundle:Default:etuAttriRencontre.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'post' => false,
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
        $infos = $query->getRencontreTuteur($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];

        $etuAttriRencontre = new RencontreEtu();
        $etuAttriRencontre->setDateRencontre($infos['dateRencontre']);
        $etuAttriRencontre->setClient($infos['client']);
        $etuAttriRencontre->setEnvironnementTechnique($infos['environnementTechnique']);
        $etuAttriRencontre->setIntegrationEntreprise($infos['integrationEntreprise']);
        $etuAttriRencontre->setMissions($infos['missions']);
        $etuAttriRencontre->setMotscles($infos['motscles']);
        $etuAttriRencontre->setRemarquesTuteur($infos['remarquesTuteur']);
        $etuAttriRencontre->setService($infos['service']);
        $etuAttriRencontre->setSignatureTuteur($infos['signatureTuteur'] != 0 ? true : false);

        $form = $this->createForm(new RencontreEtuType(), $etuAttriRencontre);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $rencontre = $form->getData();

                $updateInfos = $this->get("update_queries");
                $updateInfos->profUpdateRencontre($conn, $rencontre, $name);

                $infos = $query->getRencontreTuteur($conn,$name);

                $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
                $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
                $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";

                return $this->render('LEAProfBundle:Default:etuAttriRencontre.html.twig', array(
                    'infos' => $infos,
                    'name'  => $name,
                    'post' => true,
                ));
            }
        }
        return $this->render('LEAProfBundle:Default:etuAttriRencontreEdit.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'form'  => $form->createView(),
        ));
    }

}