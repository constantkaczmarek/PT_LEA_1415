<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:48
 */

namespace LEA\EtuBundle\Dbmngt;


class queriesEtu {

    public function doGetAltRefForStudent($conn,$student)
    {

        $query = $conn->fetchArray("select alternanceCle from contrat where etudRef='".$student."';");

        if ($query === FALSE){
            return FALSE;
        }
        else {
            return $query[0];
        }
    }

} 