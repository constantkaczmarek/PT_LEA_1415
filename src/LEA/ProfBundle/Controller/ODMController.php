<?php

namespace LEA\ProfBundle\Controller;

use LEA\ProfBundle\Entity\ODM;
use LEA\ProfBundle\Form\ODMType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\ProfBundle\Entity\ChoixSansTuteur;
use LEA\ProfBundle\Form\ChoixSansTuteurType;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;


class ODMController extends Controller
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

        $odm = false;
        if($this->getRequest()->attributes->get('_route')=='lea_prof_odm')
            $odm = true;

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosStage($conn,$name);

        return $this->render('LEAEtuBundle:Default:afficheInfosStage.html.twig',array(
            'name' => $name,
            'infos' => $infos,
            'role' => "prof",
            'odm' => $odm,
            'page' => 'etu_attribues',
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));
    }

    public function creerAction($name){


        $conn = $this->get('database_connection');
        $gestionRole = $this->get('gestion_role');
        $session = $this->getRequest()->getSession();

        if (!$session || !$session->has('CK_ROLES') || !$gestionRole->hasRole($session, "PROF"))
        {
            return $this->redirect(
                $this->generateUrl('lea_role_homepage'));
        }
        $query = $this->get('queries');

        $donneODM = $query->getDonneeODM($conn,$name,2014)[0];

        $ODM = new ODM();
        $ODM->setNom($donneODM["membreNom"]);
        $ODM->setPrenom($donneODM["membrePrenom"]);
        $ODM->setObjet("Visite pédagogique en entreprise<br/> Etudiant : " . $donneODM["etuNom"] . " " . $donneODM["etuPrenom"] . "<br/> Formation : " . $donneODM["formationRef"] . " ");
        $ODM->setAdresse($donneODM["adresse"]);
        $ODM->setLieu($donneODM["ville"]);
        $ODM->setPays("France");

        $ODM->setDepartAller("Villeneuve d'ascq");
        $ODM->setKmAller($donneODM["distance"]);
        $ODM->setArriverAller($donneODM["adresse"]);
        $ODM->setDepartRetour($donneODM["adresse"]);
        $ODM->setArriverRetour("Villeneuve d'ascq");

        $ODM->setHoraireDepartAller("09:00");
        $ODM->setHoraireDepartRetour("09:00");
        $ODM->setHoraireArriverAller("11:00");
        $ODM->setHoraireArriverRetour("11:00");

        if($ODM->getKmAller()<25)
            $ODM->setFrais(true);
        else
            $ODM->setFrais(false);

        $ODMType = new ODMType($donneODM);

        $form = $this->createForm($ODMType,$ODM);

        $request = $this->getRequest();

        if($request->isMethod('POST')) {

            $form->bind($request);

            if ($form->isValid()) {

                $donneODM = $form->getData();

                $nbjours = $donneODM->getDateAller()->diff($donneODM->getDateRetour());


                $html = $this->renderView('LEAProfBundle:Default:exportPDF.html.twig', array(
                    'name' => $name,
                    'donneODM' => $donneODM,
                    'dateNow' => new \DateTime(),
                    'nbjours' => $nbjours->format('%a jours')
                ));

                $html2pdf = $this->get('html2pdf_factory')->create('P','A4','fr');
                $html2pdf->writeHTML($html);
                $html2pdf->Output('Facture.pdf');


                /*
                $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');
                $html2pdf->pdf->SetDisplayMode('real');
                $html2pdf->writeHTML($html);
                $html2pdf->Output('Facture.pdf');*/
                return new Response();
            }
        }
        return $this->render('LEAProfBundle:Default:creerODM.html.twig',array(
            'name' => $name,
            'form' => $form->createView(),
            'page' => 'etu_attribues',
            'resp'=> $gestionRole->hasRole($session, "RESP"),
        ));

    }


}



