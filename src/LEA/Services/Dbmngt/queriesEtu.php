<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:48
 */

namespace LEA\Services\Dbmngt;


class queriesEtu {

    public function doGetAltRefForStudent($conn,$student)
    {

        $query = $conn->fetchAll("select alternanceCle from contrat where etudRef='".$student."';");

        if ($query === FALSE){
            return FALSE;
        }
        else {
            return $query[0];
        }
    }

    function doGetTuteurInfoForStudent($conn,$student,$yearRef)
    {
        $query=$conn->fetchAll("select membre.nom, membre.prenom,membre.mail from
                        membre inner join contrat on tuteurRef=profCle where
                        etudRef = '".$student."' and anneeCle=".$yearRef." and notifAttribTuteur>0 ;");

        if ($query===null)
            return $query;
        else
            return $query;

    }

} 