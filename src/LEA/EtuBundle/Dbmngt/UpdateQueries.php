<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:52
 */

namespace LEA\EtuBundle\Dbmngt;

use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;


class UpdateQueries {


    public function updateInfosStage($conn,$infosStage,$altRef,$etuCle){

        $transf = new DateTimeToStringTransformer();

        $queryString="update contrat set ";
        if ($infosStage->getTuteur()!=="NULL") {
            $queryString .= "tuteurRef='" . $infosStage->getTuteur() . "', ";
        }
        else {
            $queryString .= "tuteurRef=NULL, ";
        }

        /* if ($infosStage["15"]) {
            $queryString.="opcaRef='".$infosStage["20"]."',";
        }*/
        if($infosStage->getBureau()){
            $queryString.="bureauRef='".$infosStage->getBureau()."',";
        }
        if($infosStage->getReferent()){
            $queryString.="referentRef='".$infosStage->getReferent()."',";
        }
        if($infosStage->getReferent1()){
            $queryString.="referentRef2='".$infosStage->getReferent1()."',";
        }
        if($infosStage->getBureauAlt()){
            $queryString.="regieBureauRef='".$infosStage->getBureauAlt()."',";
        }
        if($infosStage->getReferentAlt()){
            $queryString.="regieReferentRef='".$infosStage->getReferentAlt()."',";
        }
        if($infosStage->getReferent1Alt()){
            $queryString.="regieReferentRef2='".$infosStage->getReferent1Alt()."',";
        }
        // Fin ajout
        $queryString.="debutContrat='". $transf->transform($infosStage->getDateDebutContrat())."', finContrat='".$transf->transform($infosStage->getDateFinContrat())."', accordOPCA='".$transf->transform($infosStage->getDateContrat())."', signatureContrat='".$transf->transform($infosStage->getDateContrat())."'  where alternanceCle='".$altRef."'";

        $queryStringEtu="update etudiant set mail='".$infosStage->getMail()."', tel='".$infosStage->getTel()."' where etudCle='".$etuCle."'";

        $conn->query($queryString);
        $conn->query($queryStringEtu);

    }

    public function updateInfosMissions($conn,$infosMissions,$altRef){

        $conn->query("update infoetud set dateSaisie='".'haha'."', service='".$infosMissions->getService()."', client='".$infosMissions->getClient().
            "', missions='".$infosMissions->getMissions()."', environnementTechnique='".$infosMissions->getTechnos()."', motscles='".$infosMissions->getMotscles()."' where alternanceRef='".$altRef."'");

    }

} 