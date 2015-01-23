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

    /************************** Bundle Professeur **************************/

    public function enregChoixTuteur($conn,$choix){

        foreach($choix->getAltCle()[0] as $value ){
            $conn->query("INSERT INTO `temp_tuteurs` (`etat`,`tuteurRef`,`formationRef`,`alternanceRef`) VALUES ('0','".$choix->getTuteurRef()."','".$choix->getFormationRef()."','".$value."')");
        }
    }

    public function updateMissionSoutenance($conn, $validationRencontre, $altRef) {
        $conn->query("update etapemissionsout set signatureEtud='".$validationRencontre->getSignatureEtud()."', remarquesEtud='".$validationRencontre->getRemarquesEtud()."' where alternanceRef='".$altRef."'");
    }

    public function profUpdateRencontre($conn, $rencontre, $altRef) {

        $verif = $conn->fetchAll("select alternanceRef from etapeetudtut where alternanceRef='".$altRef."'");
        if (count($verif) === 0)
            $conn->query("insert into etapeetudtut (`alternanceRef`) values ('".$altRef."')");

        $conn->query("update etapeetudtut set dateRencontre='".$rencontre->getDateRencontre()."', service='".$rencontre->getService()."', client='".$rencontre->getClient().
            "', missions='".$rencontre->getMissions()."', environnementTechnique='".$rencontre->getEnvironnementTechnique()."', integrationEntreprise='".$rencontre->getIntegrationEntreprise().
            "', signatureTuteur='".$rencontre->getSignatureTuteur()."', remarquesTuteur='".$rencontre->getRemarquesTuteur().
            "', motscles='".$rencontre->getMotscles()."' where alternanceRef='".$altRef."'");
    }

    public function profUpdateVisiteUn($conn, $visiteUn, $altRef) {

        $verif = $conn->fetchAll("select alternanceRef from etapevisite1 where alternanceRef='".$altRef."'");
        if(count($verif) === 0)
            $conn->query("insert into etapevisite1 (`alternanceRef`) values ('".$altRef."')");

        $conn->query("update etapevisite1 set dateRencontre='".$visiteUn->getDateRencontre()."', adequationMission='".$visiteUn->getAdequationMission()."', integrationEtudiant='".$visiteUn->getIntegrationEtudiant().
            "', signatureTuteur='".$visiteUn->getSignatureTuteur()."', signatureReferent='".$visiteUn->getSignatureReferent().
            "', remarquesTuteur='".$visiteUn->getRemarquesTuteur()."', remarquesReferent='".$visiteUn->getRemarquesReferent()."' ".
            "where alternanceRef='".$altRef."'");
    }

    public function profUpdateVisiteDeux($conn, $visiteDeux, $altRef) {

        $verif = $conn->fetchAll("select alternanceRef from etapevisite2 where alternanceRef='".$altRef."'");
        if(count($verif) === 0)
            $conn->query("insert into etapevisite2 (`alternanceRef`) values ('".$altRef."')");

        $conn->query("update etapevisite2 set dateRencontre='".$visiteDeux->getDateRencontre().
            "', pointsPositifs='".$visiteDeux->getPointsPositifs().
            "', pointsProgres='".$visiteDeux->getPointsProgres().
            "', avancementProjet='".$visiteDeux->getAvancementProjet().
            "', dateProbableSoutenance='".$visiteDeux->getDateProbableSoutenance().
            "', signatureTuteur='".$visiteDeux->getSignatureTuteur()."', signatureReferent='".$visiteDeux->getSignatureReferent().
            "', remarquesTuteur='".$visiteDeux->getRemarquesTuteur()."', remarquesReferent='".$visiteDeux->getRemarquesReferent()."' ".
            "where alternanceRef LIKE '".$altRef."'");
    }

    public function profUpdateMissionSoutenance($conn, $missionSoutenance, $altRef) {

        $verif = $conn->fetchAll("select alternanceRef from etapemissionsout where alternanceRef='".$altRef."'");
        if(count($verif) === 0)
            $conn->query("insert into etapemissionsout (`alternanceRef`) values ('".$altRef."');");

        $conn->query("update etapemissionsout set dateRencontre='".$missionSoutenance->getDateRencontre().
            "', typeRencontre='".$missionSoutenance->getTypeRencontre().
            "', dateValidation='".$missionSoutenance->getDateValidation().
            "', missions='".$missionSoutenance->getMissions().
            "', environnementTechnique='".$missionSoutenance->getEnvironnementTechnique().
            "', enjeux='".$missionSoutenance->getEnjeux().
            "', signatureTuteur='".$missionSoutenance->getSignatureTuteur()."', signatureReferent='".$missionSoutenance->getSignatureReferent().
            "', remarquesTuteur='".$missionSoutenance->getRemarquesTuteur()."', remarquesReferent='".$missionSoutenance->getRemarquesReferent()."' ".
            "where alternanceRef='".$altRef."'");
    }

    public function profStopSuivi ($conn, $altCle) {

        $conn->query("update  contrat set tuteurRef=null, notifAttribTuteur=0 where alternanceCle in ('".$altCle."');");
    }

    /************************** Bundle Responsable **************************/

    public function inscrireTuteur($conn, $alternanceCle,$tuteurRef)
    {
        $dejaAttribueQuery="select alternanceCle from contrat where
                              alternanceCle='$alternanceCle' and tuteurRef='$tuteurRef'";

        if($conn->fetchAll($dejaAttribueQuery)){
            return 2;
        }

        if($tuteurRef === '__aucun__') {
            $tuteurRef = "NULL";
        }

        $conn->query("update contrat Set tuteurRef='".$tuteurRef."', notifAttribTuteur=0 where alternanceCle='".$alternanceCle."';");
    }
}