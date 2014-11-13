<?php

namespace LEA\EtuBundle\Controller;

use LEA\EtuBundle\Dbmngt\Queries;
use LEA\EtuBundle\Entity\infosStage;
use LEA\EtuBundle\Form\infosStageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\DBAL\Connection;
use LEA\EtuBundle\Dbmngt\queriesEtapes;
use LEA\EtuBundle\Dbmngt\queriesEtu;
use LEA\EtuBundle\Dbmngt\UpdateQueries;
use LEA\EtuBundle\Dbmngt\Dbutils;

class StageController extends Controller
{

    public function indexAction($name)
    {

        //$rsm = new ResultSetMapping();
        //$em = $this->getDoctrine()->getManager()

        $conn = $this->get('database_connection');

        $queryEtu = new queriesEtu();
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name);

        $query = new queriesEtapes();
        $infos = $query->getInfosStage($conn,$altRef);

        $dbQueries = new Queries();
        $listEntr = $dbQueries->getListeEntreprise($conn);
        $listBureau = $dbQueries->getBureauEntreprise($conn,$infos["21"]);
        $listReferent = $dbQueries->getListeReferent($conn,$infos["21"]);

        $infosStage = new infosStage();

        $infosStage->setTel((int)$infos["4"]);
        $infosStage->setMail($infos["5"]);
        $infosStage->setDateContrat(new \DateTime($infos["16"]));
        $infosStage->setDateDebutContrat(new \DateTime($infos["18"]));
        $infosStage->setDateFinContrat(new \DateTime($infos["19"]));


        $form = $this->createForm(new infosStageType($infos,$listEntr,$listBureau,$listReferent),$infosStage);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosStage = $form->getData();
                $updateInfos = new UpdateQueries();
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


}
