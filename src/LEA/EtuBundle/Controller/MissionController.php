<?php

namespace LEA\EtuBundle\Controller;

use LEA\EtuBundle\Entity\infosMission;
use LEA\EtuBundle\Form\infosMissionsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MissionController extends Controller
{

    public function indexAction()
    {

        $conn = $this->get('database_connection');
        $session = $this->getRequest()->getSession();

        $nameEtu = $session->get('etudiant');
        $queryEtu = $this->get('queries_etu');
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$nameEtu)["alternanceCle"];

        $query = $this->get('queries_etapes');
        $infos = $query->getInfosMissions($conn,$altRef);

        $infosMissions = new infosMission();
        $infosMissions->setClient($infos["client"]);
        $infosMissions->setService($infos["service"]);
        $infosMissions->setMissions($infos["mission"]);
        $infosMissions->setTechnos($infos["techno"]);
        $infosMissions->setMotscles($infos["motscle"]);

        $form = $this->createForm(new infosMissionsType(),$infosMissions);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosMissions = $form->getData();
                $updateInfos = $this->get("update_queries");
                $updateInfos->updateInfosMissions($conn,$infosMissions,$altRef);

                return $this->redirect(
                    $this->generateUrl('lea_etu_homepage',array(
                        'name' => $nameEtu,
                    ))
                );
            }
        }

        return $this->render('LEAEtuBundle:Default:infosMissionEtu.html.twig',array(
            'form'=> $form->createView(),
            'infosMissions' => $infosMissions,
            'altref' => $altRef,
            'name' => $nameEtu
        ));
    }


}
