<?php

namespace LEA\EtuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etapeetudtut
 *
 * @ORM\Table(name="etapeetudtut")
 * @ORM\Entity
 */
class Etapeetudtut
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
     * @ORM\Column(name="dateRencontre", type="date", nullable=true)
     */
    private $daterencontre;

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
     * @ORM\Column(name="integrationEntreprise", type="text", nullable=true)
     */
    private $integrationentreprise;

    /**
     * @var boolean
     *
     * @ORM\Column(name="signatureEtud", type="boolean", nullable=true)
     */
    private $signatureetud;

    /**
     * @var boolean
     *
     * @ORM\Column(name="signatureTuteur", type="boolean", nullable=true)
     */
    private $signaturetuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="remarquesEtud", type="text", nullable=true)
     */
    private $remarquesetud;

    /**
     * @var string
     *
     * @ORM\Column(name="remarquesTuteur", type="text", nullable=true)
     */
    private $remarquestuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="motsCles", type="text", nullable=false)
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
     * Set daterencontre
     *
     * @param \DateTime $daterencontre
     * @return Etapeetudtut
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
     * Set service
     *
     * @param string $service
     * @return Etapeetudtut
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
     * @return Etapeetudtut
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
     * @return Etapeetudtut
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
     * @return Etapeetudtut
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
     * Set integrationentreprise
     *
     * @param string $integrationentreprise
     * @return Etapeetudtut
     */
    public function setIntegrationentreprise($integrationentreprise)
    {
        $this->integrationentreprise = $integrationentreprise;

        return $this;
    }

    /**
     * Get integrationentreprise
     *
     * @return string 
     */
    public function getIntegrationentreprise()
    {
        return $this->integrationentreprise;
    }

    /**
     * Set signatureetud
     *
     * @param boolean $signatureetud
     * @return Etapeetudtut
     */
    public function setSignatureetud($signatureetud)
    {
        $this->signatureetud = $signatureetud;

        return $this;
    }

    /**
     * Get signatureetud
     *
     * @return boolean 
     */
    public function getSignatureetud()
    {
        return $this->signatureetud;
    }

    /**
     * Set signaturetuteur
     *
     * @param boolean $signaturetuteur
     * @return Etapeetudtut
     */
    public function setSignaturetuteur($signaturetuteur)
    {
        $this->signaturetuteur = $signaturetuteur;

        return $this;
    }

    /**
     * Get signaturetuteur
     *
     * @return boolean 
     */
    public function getSignaturetuteur()
    {
        return $this->signaturetuteur;
    }

    /**
     * Set remarquesetud
     *
     * @param string $remarquesetud
     * @return Etapeetudtut
     */
    public function setRemarquesetud($remarquesetud)
    {
        $this->remarquesetud = $remarquesetud;

        return $this;
    }

    /**
     * Get remarquesetud
     *
     * @return string 
     */
    public function getRemarquesetud()
    {
        return $this->remarquesetud;
    }

    /**
     * Set remarquestuteur
     *
     * @param string $remarquestuteur
     * @return Etapeetudtut
     */
    public function setRemarquestuteur($remarquestuteur)
    {
        $this->remarquestuteur = $remarquestuteur;

        return $this;
    }

    /**
     * Get remarquestuteur
     *
     * @return string 
     */
    public function getRemarquestuteur()
    {
        return $this->remarquestuteur;
    }

    /**
     * Set motscles
     *
     * @param string $motscles
     * @return Etapeetudtut
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
