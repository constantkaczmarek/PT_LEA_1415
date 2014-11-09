<?php

namespace LEA\EtuBundle\Controller;

use LEA\EtuBundle\Entity\infosMission;
use LEA\EtuBundle\Form\infosMissionsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\DBAL\Connection;
use LEA\EtuBundle\Dbmngt\queriesEtapes;
use LEA\EtuBundle\Dbmngt\queriesEtu;
use LEA\EtuBundle\Dbmngt\UpdateQueries;

class MissionController extends Controller
{

    public function indexAction($name)
    {

        //$rsm = new ResultSetMapping();
        $em = $this->getDoctrine()->getEntityManager();

        $conn = $this->get('database_connection');

        $queryEtu = new queriesEtu();
        $altRef = $queryEtu->doGetAltRefForStudent($conn,$name);

        $query = new queriesEtapes();
        $infos = $query->getInfosMissions($conn,$altRef);

        $infosMissions = new infosMission();
        $infosMissions->setClient($infos[6]);
        $infosMissions->setService($infos[5]);
        $infosMissions->setMissions($infos[7]);
        $infosMissions->setTechnos($infos[8]);
        $infosMissions->setMotscles($infos[14]);

        $form = $this->createForm(new infosMissionsType(),$infosMissions);

        $request = $this->getRequest();

        if($request->isMethod('POST')){

            $form->bind($request);

            if($form->isValid()) {

                $infosMissions = $form->getData();
                $updateInfos = new UpdateQueries();
                $updateInfos->updateInfosMissions($conn,$infosMissions,$altRef);

                return $this->redirect(
                    $this->generateUrl('lea_etu_homepage',array(
                        'name' => $name,
                    ))
                );
            }
        }

        return $this->render('LEAEtuBundle:Default:infosMissionEtu.html.twig',array(
            'form'=> $form->createView(),
            'infosMissions' => $infosMissions,
            'altref' => $altRef,
        ));
    }


}
