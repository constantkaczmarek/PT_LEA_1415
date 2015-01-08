<?php

namespace LEA\ProfBundle\Entity;

class VisiteUn
{
    protected $dateRencontre;
    protected $adequationMission;
    protected $integrationEtudiant;
    protected $signatureTuteur;
    protected $remarquesTuteur;
    protected $signatureReferent;
    protected $remarquesReferent;

    /**
     * @return mixed
     */
    public function getAdequationMission()
    {
        return $this->adequationMission;
    }

    /**
     * @param mixed $adequationMission
     */
    public function setAdequationMission($adequationMission)
    {
        $this->adequationMission = $adequationMission;
    }

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
    public function getIntegrationEtudiant()
    {
        return $this->integrationEtudiant;
    }

    /**
     * @param mixed $integrationEtudiant
     */
    public function setIntegrationEtudiant($integrationEtudiant)
    {
        $this->integrationEtudiant = $integrationEtudiant;
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

}