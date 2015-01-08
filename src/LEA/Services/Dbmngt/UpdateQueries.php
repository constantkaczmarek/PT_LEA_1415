<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:52
 */

namespace LEA\Services\Dbmngt;

use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToStringTransformer;
use Symfony\Component\Validator\Constraints\DateTime;


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

        if($infosStage->getBureau()){
            $queryString.="bureauRef='".$infosStage->getBureau()."',";
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
        $transf = new DateTimeToStringTransformer();

        $conn->query("update infoetud set dateSaisie='".$transf->transform(new \DateTime())."', service='".$infosMissions->getService()."', client='".$infosMissions->getClient().
            "', missions='".$infosMissions->getMissions()."', environnementTechnique='".$infosMissions->getTechnos()."', motscles='".$infosMissions->getMotscles()."' where alternanceRef='".$altRef."'");
    }

    public function updateRencontre($conn, $validationRencontre, $altCle){
        $conn->query("update etapeetudtut set signatureEtud='".$validationRencontre->getSignatureEtud()."', remarquesEtud='".$validationRencontre->getRemarquesEtud()."' where alternanceRef='".$altCle."'");
    }

    public function updateVisiteUn($conn, $validationRencontre, $altCle){
        $conn->query("update etapevisite1 set signatureEtud='".$validationRencontre->getSignatureEtud()."', remarquesEtud='".$validationRencontre->getRemarquesEtud()."' where alternanceRef='".$altCle."'");
    }

    public function updateVisiteDeux($conn, $validationRencontre, $altCle){
        $conn->query("update etapevisite2 set signatureEtud='".$validationRencontre->getSignatureEtud()."', remarquesEtud='".$validationRencontre->getRemarquesEtud()."' where alternanceRef='".$altCle."'");
    }

    public function enregChoixTuteur($conn,$choix){
        $conn->query("INSERT INTO `temp_tuteurs` (`etat`,`tuteurRef`,`formationRef`,`alternanceRef`) VALUES ('0','".$choix->getTuteurRef()."','".$choix->getFormationRef()."','".$choix->getAltCle()."')");
    }

    public function updateMissionSoutenance($conn, $validationRencontre, $altCle) {
        $conn->query("update etapemissionsout set signatureEtud='".$validationRencontre->getSignatureEtud()."', remarquesEtud='".$validationRencontre->getRemarquesEtud()."' where alternanceRef='".$altCle."'");
    }

    public function profUpdateRencontre($conn, $rencontre, $altCle) {
        $conn->query("update etapeetudtut set dateRencontre='".$rencontre->getDateRencontre()."', service='".$rencontre->getService()."', client='".$rencontre->getClient().
            "', missions='".$rencontre->getMissions()."', environnementTechnique='".$rencontre->getEnvironnementTechnique()."', integrationEntreprise='".$rencontre->getIntegrationEntreprise().
            "', signatureTuteur='".$rencontre->getSignatureTuteur()."', remarquesTuteur='".$rencontre->getRemarquesTuteur().
            "', motscles='".$rencontre->getMotscles()."' where alternanceRef='".$altCle."'");
    }
}