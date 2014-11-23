<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\EtuBundle\Dbmngt;

use LEA\EtuBundle\Distance\CalculDistance;

class Inscrire {


    public function inscrireEntr($conn,$infosEntr,$dist,$norm){


        $queryString = $conn->fetchArray("select nom from entreprise where upper(nom) like '" .
            $norm->genererFiltreGeneriqueDeRechercheEntrepriseAPartirDeNom($infosEntr->getNom())."';");

        if ($queryString) {
            return "NOK : Une entreprise portant un nom très similaire (" . $queryString["0"] . ") se trouve déjà dans la base! Contactez marius.bilasco@lifl.fr !";
        }
        $cle = $norm->genererCleEntrepriseAPartirDeNom($infosEntr->getNom());

        $queryString = "insert into entreprise(`nom`, `adresse`, `tel`, `ville`, `codePostal`, `opcaRef`, `entrepriseCle`)
            values" .
            "('" . $infosEntr->getNom() . "'," .
            "'" . $infosEntr->getAdresse() . "'," .
            "'" . $infosEntr->getTel() . "'," .
            "'" . $infosEntr->getVille() . "'," .
            "'" . $infosEntr->getCp() . "'," .
            "'" . $infosEntr->getOpca() . "'," .
            "'" . $cle . "'" .
            ")";
        $conn->query($queryString);

        $DistanceTmp = $dist->getDistance($infosEntr->getAdresse()." ".$infosEntr->getCp()." ".$infosEntr->getVille());

        $queryString = "insert into bureau(`bureauCle`, `entrepriseRef`, `adresse`, `codePostal`, `ville`, `tel`,`distance`)
        values" .
            "('" . $cle . "_siege'," .
            "'" . $cle . "'," .
            "'" . $infosEntr->getAdresse() . "'," .
            "'" . $infosEntr->getCp() . "'," .
            "'" . $infosEntr->getVille() . "'," .
            "'" . $infosEntr->getTel() . "'," .
            "'" . $DistanceTmp . "'" .
            ")";

        $conn->query($queryString);

        $queryString = "insert into referent (`referentCle`, `entrepriseRef`,`nom`,`prenom`)
        values ('__sans referent___".strtoupper($cle)."','$cle','__sans','referent__')";

        $conn->query($queryString);
    }

    function inscrireBureau($conn,$infosBur,$dist,$norm, $entreprise) {


        $nom = $entreprise . "_" . $infosBur->getVille() . "_" . $infosBur->getAdresse();
        $cle = $norm->genererCleBureau($entreprise,$infosBur->getVille(),$infosBur->getAdresse());

        // Verification de l'unicité de la cle bureau (Primary KEY)
        $queryString = $conn->fetchArray("select * from bureau where lower(bureauCle) like '" .$cle."';");
        if ($queryString) {
                echo "NOK : Un bureau avec à cette adresse pour l'entreprise " . $entreprise . " existe déjà !";
        }

        //Verification que l'entreprise existe (Foreign KEY )
        $queryString = $conn->fetchArray("select * from entreprise where lower(entrepriseCle) like '" .
            $norm->genererCleEntrepriseAPartirDeNom($entreprise). "';");

        if (!$queryString) {// Si le resultat est null cela veut dire que l'entreprise n'existe pas !
            echo "NOK : L'entreprise n'éxiste pas ! Une entreprise inexistante ne peut avoir de bureau !";
        }


        $DistanceTmp = $dist->getDistance($infosBur->getAdresse()." ".$infosBur->getCp()." ".$infosBur->getVille());

        $queryString = "insert into bureau(`bureauCle`, `entrepriseRef`, `adresse`, `codePostal`, `ville`, `tel`,`distance`)
      values" .
            "('" . $cle . "'," .
            "'" . $norm->genererCleEntrepriseAPartirDeNom($entreprise) . "'," .
            "'" . $infosBur->getAdresse() . "'," .
            "'" . $infosBur->getCp() . "'," .
            "'" . $infosBur->getVille() . "'," .
            "'" . $infosBur->getTel() . "'," .
            "'" . $DistanceTmp . "'" .
            ")";

        $conn->query($queryString);

    }

    function inscrireRef($conn,$infosRef,$dist,$norm,$entreprise) {


        $fa_ref_nom=trim(strtoupper($infosRef->getNom()));
        $fa_ref_prenom=(trim($infosRef->getPrenom()));
        $fa_ref_prenom=(substr(strtoupper($fa_ref_prenom),0,1).substr(strtolower($fa_ref_prenom),1));
        $fa_ref_email=(trim($infosRef->getMail()));
        $fa_ref_tel=(trim($infosRef->getTel()));
        $fa_ref_fonction=(trim($infosRef->getFonction()));
        $fa_ref_bureau=(trim($infosRef->getBureau()));

        //Verification que l'entreprise existe (Foreign KEY )
        $queryString = $conn->fetchArray("select * from entreprise where lower(entrepriseCle) like '" .
            $norm->genererCleEntrepriseAPartirDeNom($entreprise). "';");

        if (!$queryString) {// Si le resultat est null cela veut dire que l'entreprise n'existe pas !
            return "NOK : L'entreprise n'éxiste pas ! Une entreprise inexistante ne peut avoir de referent !";
        }

        //Verification que le bureau existe ( Foreign KEY )
        $queryString = $conn->fetchArray("select * from bureau where lower(bureauCle) like '" .
            strtolower($fa_ref_bureau). "';");

        if (!$queryString) {// Si le resultat est null cela veut dire que l'entreprise n'existe pas !
            return "NOK : Le bureau n'existe pas ! Un bureau inexistant ne peut avoir de referent !";
        }

        $cle = $norm->genererCleReferent($fa_ref_nom,$fa_ref_prenom,$entreprise);

        $queryString = "insert into referent(`referentCle`, `entrepriseRef`, `nom`, `prenom`, `mail`, `tel`,`fonction`,`bureauRef`)
      values" .
            "('" . $cle . "'," .
            "'" . $norm->genererCleEntrepriseAPartirDeNom($entreprise) . "'," .
            "'" . $fa_ref_nom . "'," .
            "'" . $fa_ref_prenom . "'," .
            "'" . $fa_ref_email. "'," .
            "'" . $fa_ref_tel. "'," .
            "'" . $fa_ref_fonction. "'," .
            "'" . $fa_ref_bureau. "'" .
            ")";

        $conn->query($queryString);
    }



} 