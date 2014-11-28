<?php

namespace LEA\EtuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\EtuBundle\Entity\SignatureEtudiant;
use LEA\EtuBundle\Form\SignatureEtudiantType;

class RencontreController extends Controller
{

    public function indexAction($name)
    {
        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name);

        $query = $this->get('queries_etapes');
        $infos = $query->getRencontreTuteur($conn,$altRef);

        if ($infos['dateRencontre'] == null) {

            $infoExist = false;
            return $this->render('LEAEtuBundle:Default:rencontreTuteur.html.twig', array(
                'name'      => $name,
                'infoExist' => $infoExist,
            ));

        } else {

            $infoExist = true;
            $html = $this->get('html_utils');
            $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
            $infos['missions'] = $html->toMinimumLines($html->toHtml($infos['missions']), 0);
            $infos['environnementTechnique'] = $html->toMinimumLines($html->toHtml($infos['environnementTechnique']), 0);
            $infos['integrationEntreprise'] = $html->toMinimumLines($html->toHtml($infos['integrationEntreprise']), 0);
            $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
            $infos['remarquesTuteur'] = $html->toMinimumLines($html->toHtml($infos['remarquesTuteur']), 0);

            $signatureEtudiant = new SignatureEtudiant();
            $signatureEtudiant->setSignatureEtud($infos['signatureEtud'] != 0 ? true : false);
            $signatureEtudiant->setRemarquesEtud($html->toMinimumLines($html->toText($infos['remarquesEtud']), 0));

            $form = $this->createForm(new SignatureEtudiantType(), $signatureEtudiant);

            $request = $this->getRequest();

            if($request->isMethod('POST')){

                $form->bind($request);

                if($form->isValid()) {

                    $signatureEtudiant = $form->getData();
                    $updateInfos = $this->get("update_queries");
                    $updateInfos->updateRencontre($conn, $signatureEtudiant, $infos['alternanceCle']);

                    return $this->redirect(
                        $this->generateUrl('lea_etu_rencontreTuteurRendu', array(
                            'name' => $name,
                        ))
                    );
                }
            }

            return $this->render('LEAEtuBundle:Default:rencontreTuteur.html.twig', array(
                'name'      => $name,
                'infoExist' => $infoExist,
                'rendu'     => false,
                'infos' => $infos,
                'form'      => $form->createView(),
            ));
        }
    }

    public function renduAction($name)
    {
        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name);

        $query = $this->get('queries_etapes');
        $infos = $query->getRencontreTuteur($conn,$altRef);

        if ($infos['dateRencontre'] == null) {

            $infoExist = false;
            return $this->render('LEAEtuBundle:Default:rencontreTuteur.html.twig', array(
                'name'      => $name,
                'infoExist' => $infoExist,
                'rendu'     => true,
            ));

        } else {

            $infoExist = true;
            $html = $this->get('html_utils');

            $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
            $infos['missions'] = $html->toMinimumLines($html->toHtml($infos['missions']), 0);
            $infos['environnementTechnique'] = $html->toMinimumLines($html->toHtml($infos['environnementTechnique']), 0);
            $infos['integrationEntreprise'] = $html->toMinimumLines($html->toHtml($infos['integrationEntreprise']), 0);
            $infos['signatureEtud'] = $infos['signatureEtud'] != 0 ? "OUI" : "NON";
            $infos['remarquesEtud'] = $html->toMinimumLines($html->toHtml($infos['remarquesEtud']), 0);
            $infos['signatureTuteur'] = $infos['signatureTuteur'] != 0 ? "OUI" : "NON";
            $infos['remarquesTuteur'] = $html->toMinimumLines($html->toHtml($infos['remarquesTuteur']), 0);

            return $this->render('LEAEtuBundle:Default:rencontreTuteur.html.twig', array(
                'name'      => $name,
                'infoExist' => $infoExist,
                'rendu'     => true,
                'infos' => $infos,
            ));
        }
    }
}