<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\Services\Dbmngt;

class Queries {


    function getListeEntreprise($conn) {
        $query = $conn ->fetchAll("select '__sans entreprise__','SANS ENTREPRISE' union (select entrepriseCle, concat(nom,' - ',b.ville) from entreprise inner join bureau b on entrepriseRef=entrepriseCle where entrepriseCle not like '__sans%' and b.bureauCle like '%_siege' order by nom)");
        return $query;
    }

    function getBureauEntreprise($conn, $entrepriseCle) {
        $query = $conn ->fetchAll("(select bureauCle,concat('SIEGE : ',adresse,' - ',ville) as ad from bureau where entrepriseRef='$entrepriseCle' and bureauCle like '%_siege')
    union (select bureauCle,concat(adresse,' - ',ville)
                from bureau where entrepriseRef = '$entrepriseCle' and bureauCle not like '%_siege' order by bureauCle)");
        return $query;
    }

    function getListeReferent($conn, $entrepriseCle) {
        $query = $conn ->fetchAll("(select '__sans referent___".strtoupper($entrepriseCle)."' as keyRef,'sans referent') union ".
            "(select referentCle,concat(prenom,' ',nom,' - ',mail) from referent ".
            "where entrepriseRef = '$entrepriseCle' and referentCle not like '%sans referent%' order by referentCle)");

        return $query;
    }

    function getEtudiantFormation($conn, $formation, $yearRef=null) {
        //if ($yearRef==null) $yearRef=$_SESSION[REF_YEAR];
        $query = $conn->fetchAll("select
        contrat.alternanceCle,
        etudiant.nom as nom_etud,
        etudiant.prenom as nom_prenom,
        if (groupeCle not like concat(formationCle,'%'),concat(groupeCle),formation.formationCle) as formation,
        resp1.mail as mail_resp_form,
        resp2.mail as mail_resp_form2,
        if (bureau.ville='SANS SIEGE','',bureau.ville) as ville,
        if (referent.nom='__sans','', referent.nom) as referent,
        referent.mail as mail_referent,
        bureau.entrepriseRef as entreprise,
        if (etapeetudtut.missions is null,infoetud.missions,etapeetudtut.missions) as mission,
        if (etapeetudtut.service is null,infoetud.service,etapeetudtut.service) as service,
        if (etapeetudtut.client is null,infoetud.client,etapeetudtut.client) as client,
        if (etapeetudtut.environnementTechnique is null,infoetud.environnementTechnique,etapeetudtut.environnementTechnique) as tech,
        contrat.etudRef,
        if(length(ifnull(contrat.tuteurRef,''))=0,'aucun',contrat.tuteurRef),
        if (etapeetudtut.motscles is null,infoetud.motscles,etapeetudtut.motscles),
        membre.nom,
        membre.mail,
        etudiant.mail,
        etudiant.etudCle,
        if(contrat.notifAttribTuteur is null,0,contrat.notifAttribTuteur),
        etudiant.mailLille1,
        bureau.distance,
        bureau.adresse as bureauAd,
        bureau.codePostal as bureauCod
    from
	contrat inner join etudiant on contrat.etudRef=etudiant.etudCle
                    inner join etudiant_groupe on etudiant.etudCle=etudiant_groupe.etudRef and contrat.anneeCle=etudiant_groupe.annee
                    inner join groupe on etudiant_groupe.groupeRef=groupe.groupeCle
                    inner join formation on groupe.formationRef=formation.formationCle
                inner join
            membre as resp1 on resp1.profCle=formation.responsableRef
            left join
            membre as resp2 on resp2.profCle=formation.responsableRef2
            left join
            referent on contrat.referentRef=referent.referentCle
            left join
            etapeetudtut on contrat.alternanceCle=etapeetudtut.alternanceRef

            left join
            infoetud on contrat.alternanceCle=infoetud.alternanceRef

            left join
            membre on contrat.tuteurRef=membre.profCle
            left join
            bureau on contrat.bureauRef = bureau.bureauCle
        where '" . $formation . "' like concat('%',formationRef,'%')
              and anneeCle in (".$yearRef.") order by etudiant.nom, formationRef;");

        return $query;
    }

    function getListTuteurs($conn) {
        $query  = $conn->fetchAll("select profCle, nom, prenom, mail from membre order by nom ;");
        return $query;
    }

    function getTuteursPotentiels($conn, $formation, $alternanceRef, $yearRef=null) {
        if ($yearRef==null) $yearRef=$_SESSION[REF_YEAR];
        $query = $conn->fetchAll("select distinct
        tuteurRef, nom_tuteur, prenom_tuteur
        from
        temp_tuteurs
            where '" . $formation . "' like concat('%',formationRef,'%')
            and alternanceRef like '" . $alternanceRef . "'");
        //..and anneeCle in (".$yearRef.");";

        return $query;
    }

    function getEtudByTuteur($conn, $formation, $tuteur, $yearRef=null) {
        if ($yearRef==null) $yearRef=$_SESSION[REF_YEAR];

        $query = $conn->fetchAll("select
        contrat.alternanceCle as alternanceCle,
        etudiant.nom as nom_etud,
        etudiant.prenom as prenom_etud,
        if (groupeCle not like concat(formationCle,'%'),concat(groupeCle),formation.formationCle) as formation,
        if (bureau.ville='SANS SIEGE','',bureau.ville) as ville,
        if (referent.nom='__sans','', referent.nom) as referent,
        referent.mail as mail_referent,
        bureau.entrepriseRef as entreprise,
        if (etapeetudtut.missions is null,infoetud.missions,etapeetudtut.missions),
        if (etapeetudtut.service is null,infoetud.service,etapeetudtut.service),
        if (etapeetudtut.client is null,infoetud.client,etapeetudtut.client),
        if (etapeetudtut.environnementTechnique is null,infoetud.environnementTechnique,etapeetudtut.environnementTechnique),

        membre.nom,
        membre.mail,
        if(etudiant.mailLille1 is null,
            etudiant.mail,
            concat(etudiant.mailLille1,concat(',',etudiant.mail))
          ),
        if (etapeetudtut.motscles is null,infoetud.motscles,etapeetudtut.motscles),
        contrat.tuteurRef,
        contrat.notifAttribTuteur
    from
	contrat
            inner join etudiant on contrat.etudRef=etudiant.etudCle
                    inner join etudiant_groupe on etudiant.etudCle=etudiant_groupe.etudRef and contrat.anneeCle=etudiant_groupe.annee
                    inner join groupe on etudiant_groupe.groupeRef=groupe.groupeCle
                    inner join formation on groupe.formationRef=formation.formationCle
           inner join
                    referent on contrat.referentRef=referent.referentCle inner join
                        membre on (contrat.tuteurRef=membre.profCle ) left join
            etapeetudtut on contrat.alternanceCle=etapeetudtut.alternanceRef
                            left join
            infoetud on contrat.alternanceCle=infoetud.alternanceRef

            left join bureau on contrat.bureauRef = bureau.bureauCle
        where '" . $formation . "' like concat('%',groupe.formationRef,'%')
          and membre.profCle like '" . $tuteur . "'
          and anneeCle in (".$yearRef.")
        order by formation, nom_etud, prenom_etud ;");

        return $query;
    }

    function getTuteurFormationSuivi($conn, $tuteurRef, $yearRef=null,$onlyM1INFOFAnoParcours=false) {
        if ($yearRef==null) $yearRef=$_SESSION[REF_YEAR];
        $query = $conn->fetchAll( "select distinct
                    formation.nom,".
            ($onlyM1INFOFAnoParcours?"if(formation.formationCle like 'M1%FA' and
                           formation.formationCle not like '%MIAGE%',
                          'M1INFOFA',
                          formation.formationCle)":"formation.formationCle")." from
                    membre inner join contrat on membre.profCle=contrat.tuteurRef
                    inner join etudiant on contrat.etudRef=etudiant.etudCle
                    inner join etudiant_groupe on etudiant.etudCle=etudiant_groupe.etudRef
                                                  and contrat.anneeCle=etudiant_groupe.annee
                    inner join groupe on etudiant_groupe.groupeRef=groupe.groupeCle
                    inner join formation on groupe.formationRef=formation.formationCle
                where membre.profCle = '" . $tuteurRef . "' and contrat.anneeCle in (".$yearRef.");");

        return $query;
    }

    function getFormationSuivieTuteur($conn, $tuteurRef, $yearRef=null,$onlyM1INFOFAnoParcours=false) {
        if ($yearRef==null) $yearRef=$_SESSION[REF_YEAR];
        $query = $conn->fetchAll("select distinct

                    formation.nom,".
            ($onlyM1INFOFAnoParcours?"if(formation.formationCle like 'M1%FA' and
                           formation.formationCle not like '%MIAGE%',
                          'M1INFOFA',
                          formation.formationCle)":"formation.formationCle")." as formationCle from
                    membre inner join contrat on membre.profCle=contrat.tuteurRef
                    inner join etudiant on contrat.etudRef=etudiant.etudCle
                    inner join etudiant_groupe on etudiant.etudCle=etudiant_groupe.etudRef
                                                  and contrat.anneeCle=etudiant_groupe.annee
                    inner join groupe on etudiant_groupe.groupeRef=groupe.groupeCle
                    inner join formation on groupe.formationRef=formation.formationCle
                where membre.profCle = '" . $tuteurRef . "' and contrat.anneeCle in (".$yearRef.");");

        return $query;
    }

    function getDetailSoutenance($conn,$formation,$yearRef=null) {
        if ($yearRef==null) $yearRef=$_SESSION[REF_YEAR];
        $query= $conn->fetchAll("select formationRef,
                          dateRemise,
                          datesSoutenances,
                         	longueurRapport,
                         	duréeSoutenance as dureeSoutenance,
                         	observationsTous,
                         	observationsTuteurs,
                         	lienExterne
                  from
                    soutenance
                  where formationRef like '".$formation."'
                        and anneeReference <= $yearRef and obsolete=0  ;");
        return $query;
    }

} 