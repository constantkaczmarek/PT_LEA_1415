<?php

namespace LEA\EtuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use LEA\EtuBundle\Entity\SignatureEtudiant;
use LEA\EtuBundle\Form\SignatureEtudiantType;

class MissionSoutenanceController extends Controller
{

    public function indexAction($name)
    {
        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name)['alternanceCle'];

        $query = $this->get('queries_etapes');
        $infos = $query->getMissionSoutenance($conn,$altRef);

        if ($infos['dateRencontre'] == null) {

            $infoExist = false;
            return $this->render('LEAEtuBundle:Default:missionSoutenance.html.twig', array(
                'name'      => $name,
                'rendu'     => false,
                'infoExist' => $infoExist,
            ));

        } else {

            $infoExist = true;

            $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
            $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";
            $infos['signatureTuteur'] = $infos['signatureTuteur']!=0?"OUI":"NON";

            $signatureEtudiant = new SignatureEtudiant();
            $signatureEtudiant->setSignatureEtud($infos['signatureEtud'] != 0 ? true : false);
            $signatureEtudiant->setRemarquesEtud($infos['remarquesEtud']);

            $form = $this->createForm(new SignatureEtudiantType(), $signatureEtudiant);

            $request = $this->getRequest();

            if($request->isMethod('POST')){

                $form->bind($request);

                if($form->isValid()) {

                    $signatureEtudiant = $form->getData();
                    $updateInfos = $this->get("update_queries");
                    $updateInfos->updateMissionSoutenance($conn, $signatureEtudiant, $infos['alternanceCle']);

                    return $this->redirect(
                        $this->generateUrl('lea_etu_missionSoutenanceRendu', array(
                            'name' => $name,
                        ))
                    );
                }
            }

            return $this->render('LEAEtuBundle:Default:missionSoutenance.html.twig', array(
                'name'      => $name,
                'rendu'     => false,
                'infoExist' => $infoExist,
                'infos' => $infos,
                'form'      => $form->createView(),
            ));
        }
    }

    public function renduAction($name) {
        $conn = $this->get('database_connection');

        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name)['alternanceCle'];

        $query = $this->get('queries_etapes');
        $infos = $query->getMissionSoutenance($conn,$altRef);

        if ($infos['dateRencontre'] == null) {

            $infoExist = false;
            return $this->render('LEAEtuBundle:Default:missionSoutenance.html.twig', array(
                'name'      => $name,
                'rendu'     => true,
                'infoExist' => $infoExist,
            ));

        } else {

            $infoExist = true;

            $infos['et_pn'] = $infos['prenom'] . " " . $infos['nom'];
            $infos['signatureEtud'] = $infos['signatureEtud']!=0?"OUI":"NON";
            $infos['signatureReferent'] = $infos['signatureReferent']!=0?"OUI":"NON";
            $infos['signatureTuteur'] = $infos['signatureTuteur']!=0?"OUI":"NON";

            return $this->render('LEAEtuBundle:Default:missionSoutenance.html.twig', array(
                'name'      => $name,
                'rendu'     => true,
                'infoExist' => $infoExist,
                'infos' => $infos,
            ));
        }
    }
}