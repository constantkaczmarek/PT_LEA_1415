<?php

namespace LEA\Services\Dbmngt;

class Stats {

    function getEtudiantsParFormation($conn, $formation, $year)
    {
        $query = $conn->fetchAll(" select t1.formationRef, t1.nb, t2.nbSans from (select
                      formationRef,
                      count(*) as nb
                    from contrat c
                          join etudiant_groupe eg on eg.etudRef=c.etudRef and annee=anneeCle
                                                    and annee=".$year."
                          join etudiant on etudCle=c.etudRef
                          join groupe on groupeRef=groupeCle
                    where '$formation' like concat('%',formationRef,'%')
                group by formationRef) t1 natural left join
                (select
                      formationRef,
                      count(*) as nbSans
                    from contrat c
                          join etudiant_groupe eg on eg.etudRef=c.etudRef and annee=anneeCle
                                                    and annee=".$year."
                          join etudiant on etudCle=c.etudRef
                           join groupe on groupeRef=groupeCle

                    where length(ifnull(tuteurRef,''))=0 and '$formation' like concat('%',formationRef,'%')
                group by formationRef) t2 ;
        ");

        return $query;
    }

    function getEncadrementTuteurEtudiants($conn, $formation, $year)
    {
        $query = $conn->fetchAll(" select count(*) as count, t.nb from
                  (select
                      tuteurRef,
                      count(tuteurRef) as nb
                    from contrat c
                          join etudiant_groupe eg on eg.etudRef=c.etudRef and annee=anneeCle
                                                    and annee=".$year."
                          join etudiant on etudCle=c.etudRef
                          join groupe on groupeRef=groupeCle

                    where length(tuteurRef)>0 and '$formation' like concat('%',formationRef,'%')
                group by tuteurRef order by count(tuteurRef)) t group by t.nb order by t.nb desc ;
        ");

        return $query;
    }
}