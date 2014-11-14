<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\EtuBundle\Dbmngt;


class Queries {

    function getListeEntreprise($conn) {
        $query = $conn ->fetchArray("(select '__sans entreprise__','SANS ENTREPRISE')
      union (select entrepriseCle, concat(nom,' - ',b.ville) from entreprise inner join bureau b on entrepriseRef=entrepriseCle where entrepriseCle not like '__sans%' and b.bureauCle  like '%_siege' order by nom)
    ");

        /*foreach($query as $value){
            echo $value;
        }*/
        return $query;
    }

    function getBureauEntreprise($conn, $entrepriseCle) {
        $query = $conn ->fetchArray("(select bureauCle,concat('SIEGE : ',adresse,' - ',ville) from bureau where entrepriseRef='$entrepriseCle' and bureauCle like '%_siege')
    union (select bureauCle,concat(adresse,' - ',ville)
                from bureau where entrepriseRef = '$entrepriseCle' and bureauCle not like '%_siege' order by bureauCle)");

        return $query;
    }

    function getListeReferent($conn, $entrepriseCle) {
        $query = $conn ->fetchArray("(select '__sans referent___".strtoupper($entrepriseCle)."','sans referent') union ".
            "(select referentCle,concat(prenom,' ',nom,' - ',mail) from referent ".
            "where entrepriseRef = '$entrepriseCle' and referentCle not like '%sans referent%' order by referentCle)");

        return $query;
    }
} 