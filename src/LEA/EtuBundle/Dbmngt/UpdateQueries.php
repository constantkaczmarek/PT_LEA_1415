<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:52
 */

namespace LEA\EtuBundle\Dbmngt;


class UpdateQueries {

    public function updateInfosMissions($conn,$infosMissions,$altRef){

        $conn->query("update infoetud set dateSaisie='".'haha'."', service='".$infosMissions->getService()."', client='".$infosMissions->getClient().
            "', missions='".$infosMissions->getMissions()."', environnementTechnique='".$infosMissions->getTechnos()."', motscles='".$infosMissions->getMotscles()."' where alternanceRef='".$altRef."'");

    }

} 