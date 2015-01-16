<?php

namespace LEA\ProfBundle\Controller;

use LEA\ProfBundle\Entity\VisiteDeux;
use LEA\ProfBundle\Form\VisiteDeuxType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;


class EtuAttriVisiteDeuxController extends Controller
{
    public function indexAction($name)
    {
        $query = $this->get('queries_etapes');
        $conn = $this->get('database_connection');
        $infos = $query->getVisiteDeux($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
        $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
        $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
        $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";

        return $this->render('LEAProfBundle:Default:etuAttriVisiteDeux.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'post' => false,
        ));

    }

    public function renduAction($name)
    {
        $query = $this->get('queries_etapes');
        $conn = $this->get('database_connection');
        $infos = $query->getVisiteDeux($conn,$name);

        $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];

        $etuVisiteDeux = new VisiteDeux();
        $etuVisiteDeux->setDateRencontre($infos['dateRencontre']);
        $etuVisiteDeux->setPointsPositifs($infos['pointsPositifs']);
        $etuVisiteDeux->setPointsProgres($infos['pointsProgres']);
        $etuVisiteDeux->setAvancementProjet($infos['avancementProjet']);
        $etuVisiteDeux->setDateProbableSoutenance($infos['dateProbableSoutenance']);
        $etuVisiteDeux->setSignatureTuteur($infos['signatureTuteur'] != 0 ? true : false);
        $etuVisiteDeux->setRemarquesTuteur($infos['remarquesTuteur']);
        $etuVisiteDeux->setSignatureReferent($infos['signatureReferent'] != 0 ? true : false);
        $etuVisiteDeux->setRemarquesReferent($infos['remarquesReferent']);

        $form = $this->createForm(new VisiteDeuxType(), $etuVisiteDeux);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $visiteDeux = $form->getData();

                $updateInfos = $this->get("update_queries");
                $updateInfos->profUpdateVisiteDeux($conn, $visiteDeux, $name);

                $infos = $query->getVisiteDeux($conn,$name);

                $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
                $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
                $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
                $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";

                return $this->render('LEAProfBundle:Default:etuAttriVisiteDeux.html.twig', array(
                    'infos' => $infos,
                    'name'  => $name,
                    'post' => true,
                ));
            }
        }
        return $this->render('LEAProfBundle:Default:etuAttriVisiteDeuxEdit.html.twig', array(
            'infos' => $infos,
            'name'  => $name,
            'form'  => $form->createView(),
        ));
    }

}