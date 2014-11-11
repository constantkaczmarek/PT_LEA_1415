<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\EtuBundle\Dbmngt;


class queriesEtapes {


    public function getInfosStage($conn,$altRef){
        $query = $conn->fetchArray("select
        contrat.alternanceCle,
        etudiant.prenom as prenom_etud,
        etudiant.nom as nom_etud,
        entreprise.nom,
        etudiant.tel,
        etudiant.mail,

        membre.prenom, membre.nom as prof,
        membre.tel, membre.mail,

        referent.prenom, referent.nom ,
        referent.fonction,
        referent.tel,
        referent.mail,
        contrat.opcaRef,

        contrat.signatureContrat,
        contrat.accordOPCA,
        contrat.debutContrat,
        contrat.finContrat,

        membre.profCle,
        entreprise.entrepriseCle,
        contrat.bureauRef,
        etudiant.etudCle,
        etudiant.mailLille1,

        opca.nom,
        referent.referentCle,
        referent2.referentCle,
        regie.entrepriseRef,
        regieBureauRef,
        regieReferentRef,
        regieReferentRef2,
        concat(regie.adresse,' - ',regie.adresse),
        concat(bureau.adresse,' - ',bureau.ville),
        concat(referent.tel,' - ',referent.mail),
        concat(referent2.tel,' - ',referent2.mail),
        concat(regieReferent.tel,' - ',regieReferent.mail),
        concat(regieReferent2.tel,' - ',regieReferent2.mail),
        formationRef,
        notifAttribTuteur
    from
	(contrat inner join etudiant
		on etudCle=etudRef inner join etudiant_groupe on etudiant_groupe.annee=contrat.anneeCle
      and etudiant_groupe.etudRef=etudiant.etudCle inner join groupe on groupe.groupeCle=etudiant_groupe.groupeRef) inner join
            referent on contrat.referentRef=referent.referentCle left join
            referent referent2 on contrat.referentRef2=referent2.referentCle left join
            referent regieReferent on contrat.regieReferentRef=regieReferent.referentCle left join
            referent regieReferent2 on contrat.regieReferentRef2=regieReferent2.referentCle left join
            membre on contrat.tuteurRef=membre.profCle inner join
            bureau on contrat.bureauRef=bureau.bureauCle
            left join bureau regie on regie.bureauCle=contrat.regieBureauRef inner join
            entreprise on bureau.entrepriseRef like entreprise.entrepriseCle
            inner join opca on contrat.opcaRef=opcaCle
        where alternanceCle in ('" . $altRef . "') order by etudiant_groupe.groupeRef, prof, nom_etud, prenom_etud ;"
        );

        return $query;

    }

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
            where alternanceCle in ('". $altRef . "') order by etudiant_groupe.groupeRef, etudiant.nom;"
        );

        return $query;

    }



} 