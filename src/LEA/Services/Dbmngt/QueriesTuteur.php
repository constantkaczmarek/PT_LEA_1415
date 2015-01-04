<?php

namespace LEA\Services\Dbmngt;

class QueriesTuteur {

    function doTuteurQueryChoosedFormations($conn,$tuteurRef,$yearRef)
    {
        $query = $conn->fetchAll("select distinct if(length(formation.nom)>0,formation.nom,formation.formationCle), formation.formationCle from
                    membre inner join temp_tuteurs on membre.profCle=temp_tuteurs.tuteurRef
                    inner join contrat on contrat.alternanceCle = temp_tuteurs.alternanceRef
                    inner join etudiant on contrat.etudRef=etudiant.etudCle
                    inner join etudiant_groupe on etudiant.etudCle=etudiant_groupe.etudRef
                    inner join groupe on etudiant_groupe.groupeRef=groupe.groupeCle
                    inner join formation on groupe.formationRef=formation.formationCle
                where membre.profCle = '".$tuteurRef."' and etudiant_groupe.annee=".$yearRef." order by formation.nom;");

        return $query;
    }

    function doTuteurQueryListChoices($conn,$tuteurRef,$yearRef)
    {
        $query = $conn->fetchAll("select distinct contrat.alternanceCle, etudiant.nom,etudiant.prenom,formation.nom as nomFormation ,bureau.ville,entreprise.nom as nomEntreprise,bureau.distance,bureau.adresse,bureau.codePostal from
                    membre inner join temp_tuteurs on membre.profCle=temp_tuteurs.tuteurRef
                    inner join contrat on contrat.alternanceCle = temp_tuteurs.alternanceRef
                    inner join etudiant on contrat.etudRef=etudiant.etudCle
                    inner join etudiant_groupe on etudiant.etudCle=etudiant_groupe.etudRef
                    inner join groupe on etudiant_groupe.groupeRef=groupe.groupeCle
                    inner join formation on groupe.formationRef=formation.formationCle
                    left join referent on contrat.referentRef=referent.referentCle
                    left join entreprise on referent.entrepriseRef=entreprise.entrepriseCle
                    left join bureau on contrat.bureauRef = bureau.bureauCle
                where membre.profCle = '".$tuteurRef."' and etudiant_groupe.annee=".$yearRef." order by etudiant.nom;");

        return $query;
    }

    function doDeleteChoixTuteurPourEtudiant($conn,$alternance,$tuteur)
    {
        $query = $conn->fetchAll("delete from temp_tuteurs where alternanceRef='".$alternance."' and tuteurRef='".$tuteur."';");

        if (!$query)
            return false;
        return true;
    }

}