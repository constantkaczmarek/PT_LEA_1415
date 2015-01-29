<?php

namespace LEA\RespBundle\Entity;

class InfosSoutenanceRapport
{

    protected $formationRef;
    protected $datesSoutenances;
    protected $dateRemise;
    protected $longueurRapport;
    protected $dureeSoutenance;
    protected $observationsTous;
    protected $observationsTuteurs;
    protected $lienExterne;

    /**
     * @return mixed
     */
    public function getDateRemise()
    {
        return $this->dateRemise;
    }

    /**
     * @param mixed $dataRemise
     */
    public function setDateRemise($dataRemise)
    {
        $this->dateRemise = $dataRemise;
    }

    /**
     * @return mixed
     */
    public function getDatesSoutenances()
    {
        return $this->datesSoutenances;
    }

    /**
     * @param mixed $datesSoutenances
     */
    public function setDatesSoutenances($datesSoutenances)
    {
        $this->datesSoutenances = $datesSoutenances;
    }

    /**
     * @return mixed
     */
    public function getDureeSoutenance()
    {
        return $this->dureeSoutenance;
    }

    /**
     * @param mixed $dureeSoutenance
     */
    public function setDureeSoutenance($dureeSoutenance)
    {
        $this->dureeSoutenance = $dureeSoutenance;
    }

    /**
     * @return mixed
     */
    public function getFormationRef()
    {
        return $this->formationRef;
    }

    /**
     * @param mixed $formationRef
     */
    public function setFormationRef($formationRef)
    {
        $this->formationRef = $formationRef;
    }

    /**
     * @return mixed
     */
    public function getLienExterne()
    {
        return $this->lienExterne;
    }

    /**
     * @param mixed $lienExterne
     */
    public function setLienExterne($lienExterne)
    {
        $this->lienExterne = $lienExterne;
    }

    /**
     * @return mixed
     */
    public function getLongueurRapport()
    {
        return $this->longueurRapport;
    }

    /**
     * @param mixed $longueurRapport
     */
    public function setLongueurRapport($longueurRapport)
    {
        $this->longueurRapport = $longueurRapport;
    }

    /**
     * @return mixed
     */
    public function getObservationsTous()
    {
        return $this->observationsTous;
    }

    /**
     * @param mixed $observationsTous
     */
    public function setObservationsTous($observationsTous)
    {
        $this->observationsTous = $observationsTous;
    }

    /**
     * @return mixed
     */
    public function getObservationsTuteurs()
    {
        return $this->observationsTuteurs;
    }

    /**
     * @param mixed $observationsTuteurs
     */
    public function setObservationsTuteurs($observationsTuteurs)
    {
        $this->observationsTuteurs = $observationsTuteurs;
    }

}