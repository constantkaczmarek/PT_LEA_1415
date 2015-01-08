<?php

namespace LEA\ProfBundle\Entity;

class RencontreEtu
{
    protected $dateRencontre;
    protected $service;
    protected $client;
    protected $missions;
    protected $environnementTechnique;
    protected $integrationEntreprise;
    protected $motscles;
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
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
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
    public function getIntegrationEntreprise()
    {
        return $this->integrationEntreprise;
    }

    /**
     * @param mixed $integrationEntreprise
     */
    public function setIntegrationEntreprise($integrationEntreprise)
    {
        $this->integrationEntreprise = $integrationEntreprise;
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
    public function getMotscles()
    {
        return $this->motscles;
    }

    /**
     * @param mixed $motscles
     */
    public function setMotscles($motscles)
    {
        $this->motscles = $motscles;
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
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service)
    {
        $this->service = $service;
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