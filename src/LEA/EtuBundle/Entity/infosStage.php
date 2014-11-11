<?php

namespace LEA\EtuBundle\Entity;

class infosStage{

    protected $tel;
    protected $mail;
    protected $mailLille1;
    protected $tuteur;
    protected $entreprise;
    protected $bureau;
    protected $referent;
    protected $referent1;
    protected $dateContrat;
    protected $dateDebutContrat;
    protected $dateFinContrat;
    protected $entrepriseAlt;
    protected $bureauAlt;
    protected $referentAlt;
    protected $referent1Alt;

    /**
     * @return mixed
     */
    public function getDateContrat()
    {
        return $this->dateContrat;
    }

    /**
     * @param mixed $dateContrat
     */
    public function setDateContrat($dateContrat)
    {
        $this->dateContrat = $dateContrat;
    }

    /**
     * @return mixed
     */
    public function getDateDebutContrat()
    {
        return $this->dateDebutContrat;
    }

    /**
     * @param mixed $dateDebutContrat
     */
    public function setDateDebutContrat($dateDebutContrat)
    {
        $this->dateDebutContrat = $dateDebutContrat;
    }

    /**
     * @return mixed
     */
    public function getDateFinContrat()
    {
        return $this->dateFinContrat;
    }

    /**
     * @param mixed $dateFinContrat
     */
    public function setDateFinContrat($dateFinContrat)
    {
        $this->dateFinContrat = $dateFinContrat;
    }

    /**
     * @return mixed
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * @param mixed $entreprise
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getReferent()
    {
        return $this->referent;
    }

    /**
     * @param mixed $referent
     */
    public function setReferent($referent)
    {
        $this->referent = $referent;
    }


    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getMailLille1()
    {
        return $this->mailLille1;
    }

    /**
     * @param mixed $mailLille1
     */
    public function setMailLille1($mailLille1)
    {
        $this->mailLille1 = $mailLille1;
    }

    /**
     * @return mixed
     */
    public function getBureau()
    {
        return $this->bureau;
    }

    /**
     * @param mixed $bureau
     */
    public function setBureau($bureau)
    {
        $this->bureau = $bureau;
    }

    /**
     * @return mixed
     */
    public function getReferent1()
    {
        return $this->referent1;
    }

    /**
     * @param mixed $referent1
     */
    public function setReferent1($referent1)
    {
        $this->referent1 = $referent1;
    }

    /**
     * @return mixed
     */
    public function getBureauAlt()
    {
        return $this->bureauAlt;
    }

    /**
     * @param mixed $bureauAlt
     */
    public function setBureauAlt($bureauAlt)
    {
        $this->bureauAlt = $bureauAlt;
    }

    /**
     * @return mixed
     */
    public function getReferentAlt()
    {
        return $this->referentAlt;
    }

    /**
     * @param mixed $referentAlt
     */
    public function setReferentAlt($referentAlt)
    {
        $this->referentAlt = $referentAlt;
    }

    /**
     * @return mixed
     */
    public function getReferent1Alt()
    {
        return $this->referent1Alt;
    }

    /**
     * @param mixed $referent1Alt
     */
    public function setReferent1Alt($referent1Alt)
    {
        $this->referent1Alt = $referent1Alt;
    }

    /**
     * @return mixed
     */
    public function getEntrepriseAlt()
    {
        return $this->entrepriseAlt;
    }

    /**
     * @param mixed $entrepriseAlt
     */
    public function setEntrepriseAlt($entrepriseAlt)
    {
        $this->entrepriseAlt = $entrepriseAlt;
    }

    /**
     * @return mixed
     */
    public function getTuteur()
    {
        return $this->tuteur;
    }

    /**
     * @param mixed $tuteur
     */
    public function setTuteur($tuteur)
    {
        $this->tuteur = $tuteur;
    }


}
