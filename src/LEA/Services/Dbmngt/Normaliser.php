<?php
/**
 * Created by PhpStorm.
 * User: Kashma
 * Date: 09/11/14
 * Time: 11:17
 */

namespace LEA\Services\Dbmngt;

class Normaliser {

    function normaliserAccentsToutEnMinuscule($nom) {
        return
            str_replace(array("â","à","á","å","ä","æ"),"a",
                str_replace(array("ç"),"c",
                    str_replace(array("é","è","ê","ë"),"e",
                        str_replace(array("ï","î","ì","í"),"i",
                            str_replace(array("ñ"),"n",
                                str_replace(array("o","ö","ô","ó","ø","õ","œ"),"o",
                                    str_replace(array("š","ß"),"s",
                                        str_replace(array("ù","û","ü","ú"),"u",
                                            str_replace(array("ð","þ"),"t",
                                                str_replace(array("ý","ÿ"),"y",strtolower($nom)
                                                ))))))))));

    }

    function genererCleGenerique($nom) {
        return str_replace(array("'","-"," "),"_", $this->normaliserAccentsToutEnMinuscule($nom));
    }

    function genererFiltreGeneriqueDeRecherche($nom) {
        return str_replace(array("'","-"," ","_"),"%", $this->normaliserAccentsToutEnMinuscule($nom));
    }

    function genererCleEntrepriseAPartirDeNom($nom){
        return $this->genererCleGenerique($nom);
    }

    function genererCleBureau($entreprise,$fa_bur_ville,$fa_bur_adresse){
        return $this->genererCleGenerique($entreprise)."_".
        $this->genererCleGenerique($fa_bur_ville)."_".
        $this->genererCleGenerique($fa_bur_adresse);
    }

    function genererCleReferent($nom,$prenom,$entreprise){
        return $this->genererCleGenerique($nom."_".$prenom)."_".
        strtoupper($this->genererCleEntrepriseAPartirDeNom($entreprise)).'_'.date("YmdGis");
    }

    function genererCleEtudiant($groupeRef,$nom,$prenom) {
        return strtolower($groupeRef) . $nom[0] . $prenom[0] . rand(0, 100);
    }

    function genererFiltreGeneriqueDeRechercheEntrepriseAPartirDeNom($nom) {
        return $this->genererFiltreGeneriqueDeRecherche($nom);
    }

    function genererFiltreGeneriqueDeRechercheBureauAPartirDeNom($nom) {
        return $this->genererFiltreGeneriqueDeRecherche($nom);
    }


} 