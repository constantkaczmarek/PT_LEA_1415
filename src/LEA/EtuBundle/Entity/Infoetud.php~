<?php

namespace LEA\EtuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infoetud
 *
 * @ORM\Table(name="infoetud")
 * @ORM\Entity
 */
class Infoetud
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateSaisie", type="date", nullable=true)
     */
    private $datesaisie;

    /**
     * @var string
     *
     * @ORM\Column(name="service", type="text", nullable=false)
     */
    private $service;

    /**
     * @var string
     *
     * @ORM\Column(name="client", type="string", length=200, nullable=true)
     */
    private $client;

    /**
     * @var string
     *
     * @ORM\Column(name="missions", type="text", nullable=false)
     */
    private $missions;

    /**
     * @var string
     *
     * @ORM\Column(name="environnementTechnique", type="text", nullable=false)
     */
    private $environnementtechnique;

    /**
     * @var string
     *
     * @ORM\Column(name="motscles", type="text", nullable=false)
     */
    private $motscles;



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
     * Set datesaisie
     *
     * @param \DateTime $datesaisie
     * @return Infoetud
     */
    public function setDatesaisie($datesaisie)
    {
        $this->datesaisie = $datesaisie;

        return $this;
    }

    /**
     * Get datesaisie
     *
     * @return \DateTime 
     */
    public function getDatesaisie()
    {
        return $this->datesaisie;
    }

    /**
     * Set service
     *
     * @param string $service
     * @return Infoetud
     */
    public function setService($service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return string 
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set client
     *
     * @param string $client
     * @return Infoetud
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string 
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * Set missions
     *
     * @param string $missions
     * @return Infoetud
     */
    public function setMissions($missions)
    {
        $this->missions = $missions;

        return $this;
    }

    /**
     * Get missions
     *
     * @return string 
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * Set environnementtechnique
     *
     * @param string $environnementtechnique
     * @return Infoetud
     */
    public function setEnvironnementtechnique($environnementtechnique)
    {
        $this->environnementtechnique = $environnementtechnique;

        return $this;
    }

    /**
     * Get environnementtechnique
     *
     * @return string 
     */
    public function getEnvironnementtechnique()
    {
        return $this->environnementtechnique;
    }

    /**
     * Set motscles
     *
     * @param string $motscles
     * @return Infoetud
     */
    public function setMotscles($motscles)
    {
        $this->motscles = $motscles;

        return $this;
    }

    /**
     * Get motscles
     *
     * @return string 
     */
    public function getMotscles()
    {
        return $this->motscles;
    }
}
