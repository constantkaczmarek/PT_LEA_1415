<?php

namespace LEA\ProfBundle\Entity;

class MissionSoutenance {

    protected $dateRencontre;
    protected $typeRencontre;
    protected $dateValidation;
    protected $missions;
    protected $environnementTechnique;
    protected $enjeux;
    protected $signatureReferent;
    protected $remarquesReferent;
    protected $signatureTuteur;
    protected $remarquesTuteur;

    /**
     * @return mixed
     */
    public function getDateRencontre()
    {
        return $this->dateRencontre;
    }

    /**
     * @param mixed $dateRencontre
     */
    public function setDateRencontre($dateRencontre)
    {
        $this->dateRencontre = $dateRencontre;
    }

    /**
     * @return mixed
     */
    public function getDateValidation()
    {
        return $this->dateValidation;
    }

    /**
     * @param mixed $dateValidation
     */
    public function setDateValidation($dateValidation)
    {
        $this->dateValidation = $dateValidation;
    }

    /**
     * @return mixed
     */
    public function getRemarquesReferent()
    {
        return $this->remarquesReferent;
    }

    /**
     * @param mixed $remarquesReferent
     */
    public function setRemarquesReferent($remarquesReferent)
    {
        $this->remarquesReferent = $remarquesReferent;
    }

    /**
     * @return mixed
     */
    public function getEnjeux()
    {
        return $this->enjeux;
    }

    /**
     * @param mixed $enjeux
     */
    public function setEnjeux($enjeux)
    {
        $this->enjeux = $enjeux;
    }

    /**
     * @return mixed
     */
    public function getEnvironnementTechnique()
    {
        return $this->environnementTechnique;
    }

    /**
     * @param mixed $environnementTechnique
     */
    public function setEnvironnementTechnique($environnementTechnique)
    {
        $this->environnementTechnique = $environnementTechnique;
    }

    /**
     * @return mixed
     */
    public function getSignatureReferent()
    {
        return $this->signatureReferent;
    }

    /**
     * @param mixed $signatureReferent
     */
    public function setSignatureReferent($signatureReferent)
    {
        $this->signatureReferent = $signatureReferent;
    }

    /**
     * @return mixed
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * @param mixed $missions
     */
    public function setMissions($missions)
    {
        $this->missions = $missions;
    }

    /**
     * @return mixed
     */
    public function getRemarquesTuteur()
    {
        return $this->remarquesTuteur;
    }

    /**
     * @param mixed $remarquesTuteur
     */
    public function setRemarquesTuteur($remarquesTuteur)
    {
        $this->remarquesTuteur = $remarquesTuteur;
    }

    /**
     * @return mixed
     */
    public function getSignatureTuteur()
    {
        return $this->signatureTuteur;
    }

    /**
     * @param mixed $signatureTuteur
     */
    public function setSignatureTuteur($signatureTuteur)
    {
        $this->signatureTuteur = $signatureTuteur;
    }

    /**
     * @return mixed
     */
    public function getTypeRencontre()
    {
        return $this->typeRencontre;
    }

    /**
     * @param mixed $typeRencontre
     */
    public function setTypeRencontre($typeRencontre)
    {
        $this->typeRencontre = $typeRencontre;
    }


}