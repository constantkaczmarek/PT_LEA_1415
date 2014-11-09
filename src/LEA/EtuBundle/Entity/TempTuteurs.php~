<?php

namespace LEA\EtuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempTuteurs
 *
 * @ORM\Table(name="temp_tuteurs")
 * @ORM\Entity
 */
class TempTuteurs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="tuteurRef", type="string", length=50, nullable=false)
     */
    private $tuteurref;

    /**
     * @var string
     *
     * @ORM\Column(name="alternanceRef", type="string", length=50, nullable=false)
     */
    private $alternanceref;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_tuteur", type="string", length=50, nullable=false)
     */
    private $nomTuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_tuteur", type="string", length=50, nullable=false)
     */
    private $prenomTuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="mail_tuteur", type="string", length=200, nullable=false)
     */
    private $mailTuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="formationRef", type="string", length=20, nullable=false)
     */
    private $formationref;



    /**
     * Get etat
     *
     * @return integer 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set tuteurref
     *
     * @param string $tuteurref
     * @return TempTuteurs
     */
    public function setTuteurref($tuteurref)
    {
        $this->tuteurref = $tuteurref;

        return $this;
    }

    /**
     * Get tuteurref
     *
     * @return string 
     */
    public function getTuteurref()
    {
        return $this->tuteurref;
    }

    /**
     * Set alternanceref
     *
     * @param string $alternanceref
     * @return TempTuteurs
     */
    public function setAlternanceref($alternanceref)
    {
        $this->alternanceref = $alternanceref;

        return $this;
    }

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
     * Set nomTuteur
     *
     * @param string $nomTuteur
     * @return TempTuteurs
     */
    public function setNomTuteur($nomTuteur)
    {
        $this->nomTuteur = $nomTuteur;

        return $this;
    }

    /**
     * Get nomTuteur
     *
     * @return string 
     */
    public function getNomTuteur()
    {
        return $this->nomTuteur;
    }

    /**
     * Set prenomTuteur
     *
     * @param string $prenomTuteur
     * @return TempTuteurs
     */
    public function setPrenomTuteur($prenomTuteur)
    {
        $this->prenomTuteur = $prenomTuteur;

        return $this;
    }

    /**
     * Get prenomTuteur
     *
     * @return string 
     */
    public function getPrenomTuteur()
    {
        return $this->prenomTuteur;
    }

    /**
     * Set mailTuteur
     *
     * @param string $mailTuteur
     * @return TempTuteurs
     */
    public function setMailTuteur($mailTuteur)
    {
        $this->mailTuteur = $mailTuteur;

        return $this;
    }

    /**
     * Get mailTuteur
     *
     * @return string 
     */
    public function getMailTuteur()
    {
        return $this->mailTuteur;
    }

    /**
     * Set formationref
     *
     * @param string $formationref
     * @return TempTuteurs
     */
    public function setFormationref($formationref)
    {
        $this->formationref = $formationref;

        return $this;
    }

    /**
     * Get formationref
     *
     * @return string 
     */
    public function getFormationref()
    {
        return $this->formationref;
    }
}
