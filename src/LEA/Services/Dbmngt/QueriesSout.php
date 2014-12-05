<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\Services\Dbmngt;

class QueriesSout {


    function getDetailsSoutenanceEtu($conn,$etudRef,$yearRef) {

        $queryString=$conn->fetchAll("select formationRef,
                          dateRemise,
                          datesSoutenances,
                         	longueurRapport,
                         	duréeSoutenance,
                         	observationsTous,
                         	observationsTuteurs,
                         	lienExterne
                  from
                    soutenance
                  where formationRef in
                  (
                    select formationCle from
                      formation inner join groupe on
                        formationRef=formationCle
                      where groupeCle in
                        (
				select if(
					' M1ESERVFA1 M1IAGLFA1 M1IVIFA1 M1MOCADFA1 M1TIIRFA1 '
					like concat('% ',groupeRef,' %')
					,'M1INFOFA1',groupeRef)
				from etudiant_groupe
                         where etudRef like '".$etudRef."' and
                         annee=$yearRef
                        )
                  ) and anneeReference<=$yearRef and obsolete=0 order by anneeReference limit 1;");

        return $queryString;
    }
} 