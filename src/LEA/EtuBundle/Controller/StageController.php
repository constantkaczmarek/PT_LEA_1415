<?php

namespace LEA\EtuBundle\Controller;

use LEA\EtuBundle\Entity\infosMission;
use LEA\EtuBundle\Entity\infosStage;
use LEA\EtuBundle\Form\infosMissionsType;
use LEA\EtuBundle\Form\infosStageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\DBAL\Connection;
use LEA\EtuBundle\Dbmngt\queriesEtapes;
use LEA\EtuBundle\Dbmngt\queriesEtu;
use LEA\EtuBundle\Dbmngt\UpdateQueries;

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

        $infosStage = new infosStage();
        $infosStage->setMail($infos["5"]);


        $form = $this->createForm(new infosStageType(),$infosStage);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosMissions = $form->getData();
                $updateInfos = new UpdateQueries();
                //$updateInfos->updateInfosMissions($conn,$infosMissions,$altRef);

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
