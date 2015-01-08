<?php

namespace LEA\ProfBundle\Entity;

class VisiteDeux
{
    protected $dateRencontre;
    protected $pointsPositifs;
    protected $pointsProgres;
    protected $avancementProjet;
    protected $dateProbableSoutenance;
    protected $signatureTuteur;
    protected $remarquesTuteur;
    protected $signatureReferent;
    protected $remarquesReferent;

    /**
     * @return mixed
     */
    public function getAvancementProjet()
    {
        return $this->avancementProjet;
    }

    /**
     * @param mixed $avancementProjet
     */
    public function setAvancementProjet($avancementProjet)
    {
        $this->avancementProjet = $avancementProjet;
    }

    /**
     * @return mixed
     */
    public function getDateProbableSoutenance()
    {
        return $this->dateProbableSoutenance;
    }

    /**
     * @param mixed $dateProbableSoutenance
     */
    public function setDateProbableSoutenance($dateProbableSoutenance)
    {
        $this->dateProbableSoutenance = $dateProbableSoutenance;
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
    public function getPointsPositifs()
    {
        return $this->pointsPositifs;
    }

    /**
     * @param mixed $pointsPositifs
     */
    public function setPointsPositifs($pointsPositifs)
    {
        $this->pointsPositifs = $pointsPositifs;
    }

    /**
     * @return mixed
     */
    public function getPointsProgres()
    {
        return $this->pointsProgres;
    }

    /**
     * @param mixed $pointsProgres
     */
    public function setPointsProgres($pointsProgres)
    {
        $this->pointsProgres = $pointsProgres;
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
