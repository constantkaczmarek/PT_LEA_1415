<?php

namespace LEA\EtuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etapeechanges
 *
 * @ORM\Table(name="etapeechanges")
 * @ORM\Entity
 */
class Etapeechanges
{
    /**
     * @var string
     *
     * @ORM\Column(name="alternanceRef", type="string", length=80, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $alternanceref;

    /**
     * @var string
     *
     * @ORM\Column(name="participants", type="text", nullable=false)
     */
    private $participants;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeRencontre", type="integer", nullable=false)
     */
    private $typerencontre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRencontre", type="date", nullable=false)
     */
    private $daterencontre;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="text", nullable=false)
     */
    private $resume;

    /**
     * @var integer
     *
     * @ORM\Column(name="sujet", type="integer", nullable=false)
     */
    private $sujet;



    /**
     * Get alternanceref
     *
     * @return string 
     */
    public function getAlternanceref()
    {
        return $this->alternanceref;
    }

    /**
     * Set participants
     *
     * @param string $participants
     * @return Etapeechanges
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;

        return $this;
    }

    /**
     * Get participants
     *
     * @return string 
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Set typerencontre
     *
     * @param integer $typerencontre
     * @return Etapeechanges
     */
    public function setTyperencontre($typerencontre)
    {
        $this->typerencontre = $typerencontre;

        return $this;
    }

    /**
     * Get typerencontre
     *
     * @return integer 
     */
    public function getTyperencontre()
    {
        return $this->typerencontre;
    }

    /**
     * Set daterencontre
     *
     * @param \DateTime $daterencontre
     * @return Etapeechanges
     */
    public function setDaterencontre($daterencontre)
    {
        $this->daterencontre = $daterencontre;

        return $this;
    }

    /**
     * Get daterencontre
     *
     * @return \DateTime 
     */
    public function getDaterencontre()
    {
        return $this->daterencontre;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Etapeechanges
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set sujet
     *
     * @param integer $sujet
     * @return Etapeechanges
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return integer 
     */
    public function getSujet()
    {
        return $this->sujet;
    }
}
