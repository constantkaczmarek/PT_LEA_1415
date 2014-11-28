<?php

namespace LEA\EtuBundle\Entity;

class SignatureEtudiant
{


    protected $signatureEtud;
    protected $remarquesEtud;

    /**
     * @return mixed
     */
    public function getRemarquesEtud()
    {
        return $this->remarquesEtud;
    }

    /**
     * @param mixed $remarquesEtud
     */
    public function setRemarquesEtud($remarquesEtud)
    {
        $this->remarquesEtud = $remarquesEtud;
    }

    /**
     * @return mixed
     */
    public function getSignatureEtud()
    {
        return $this->signatureEtud;
    }

    /**
     * @param mixed $signatureEtud
     */
    public function setSignatureEtud($signatureEtud)
    {
        $this->signatureEtud = $signatureEtud;
    }

}