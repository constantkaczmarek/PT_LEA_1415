<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\EtuBundle\Dbmngt;


class queriesEtapes {



    public function getInfosMissions($conn,$altRef){

        $query=$conn->fetchArray("select
            contrat.alternanceCle,
            etudiant.prenom, etudiant.nom,
            etapeetudtut.dateRencontre,
            entreprise.nom,
            if (etapeetudtut.service is null,infoetud.service,etapeetudtut.service),
            if (etapeetudtut.client is null,infoetud.client,etapeetudtut.client),
            if (etapeetudtut.missions is null,infoetud.missions,etapeetudtut.missions),
            if (etapeetudtut.environnementTechnique is null,infoetud.environnementTechnique,etapeetudtut.environnementTechnique),
            etapeetudtut.integrationEntreprise,
            etapeetudtut.signatureEtud,etapeetudtut.remarquesEtud,
            etapeetudtut.signatureTuteur,etapeetudtut.remarquesTuteur,
            if (etapeetudtut.motscles is null,infoetud.motscles,etapeetudtut.motscles)
            from
            (contrat inner join etudiant
                on etudCle=etudRef inner join etudiant_groupe on etudiant_groupe.annee=contrat.anneeCle
            and etudiant_groupe.etudRef=etudiant.etudCle inner join groupe on groupe.groupeCle=etudiant_groupe.groupeRef) inner join
                    referent on contrat.referentRef=referent.referentCle inner join
                    bureau on contrat.bureauRef=bureau.bureauCle inner join
                    entreprise on bureau.entrepriseRef=entreprise.entrepriseCle left join
                    etapeetudtut on etapeetudtut.alternanceRef like alternanceCle left join
                    infoetud on infoetud.alternanceRef like alternanceCle
            where alternanceCle in ('".$altRef."') order by etudiant_groupe.groupeRef, etudiant.nom;"
        );

        return $query;

    }



} 