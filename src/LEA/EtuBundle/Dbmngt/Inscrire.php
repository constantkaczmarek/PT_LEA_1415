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

        //echo $queryString;
        /*if ($queryString) {
            return "NOK : Une entreprise portant un nom très similaire (" . $queryString["0"] . ") se trouve déjà dans la base! Contactez marius.bilasco@lifl.fr !";
        }*/
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

} 