<?php

namespace LEA\ProfBundle\Entity;

class ChoixSansTuteur
{

    protected $etat;
    protected $tuteurRef;
    protected $formationRef;
    protected $altCle;

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getTuteurRef()
    {
        return $this->tuteurRef;
    }

    /**
     * @param mixed $tuteurRef
     */
    public function setTuteurRef($tuteurRef)
    {
        $this->tuteurRef = $tuteurRef;
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
    public function getAltCle()
    {
        return array($this->altCle);
    }

    /**
     * @param mixed $altCle
     */
    public function setAltCle(array $altCle)
    {
        $this->altCle = $altCle;
    }


}