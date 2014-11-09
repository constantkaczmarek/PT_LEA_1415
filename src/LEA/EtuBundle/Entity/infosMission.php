<?php

namespace LEA\EtuBundle\Entity;

class infosMission{

    protected $service;
    protected $client;
    protected $missions;
    protected $technos;
    protected $motscles;

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
    public function getTechnos()
    {
        return $this->technos;
    }

    /**
     * @param mixed $technos
     */
    public function setTechnos($technos)
    {
        $this->technos = $technos;
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


}
