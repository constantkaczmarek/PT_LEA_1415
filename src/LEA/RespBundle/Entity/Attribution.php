<?php

namespace LEA\RespBundle\Entity;

class Attribution
{

    protected $tuteurRef;
    protected $altCle;
    protected $listTuteurs;

    function __construct($listTuteurs){
        $this->listTuteurs = $listTuteurs;
    }

    /**
     * @return mixed
     */
    public function getListTuteurs()
    {
        return $this->listTuteurs;
    }

    /**
     * @param mixed $listTuteurs
     */
    public function setListTuteurs(array $listTuteurs)
    {
        $this->listTuteurs = $listTuteurs;
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