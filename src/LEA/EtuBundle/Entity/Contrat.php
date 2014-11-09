<?php

namespace LEA\EtuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat")
 * @ORM\Entity
 */
class Contrat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="anneeCle", type="integer", nullable=false)
     */
    private $anneecle = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="nbHeures", type="integer", nullable=false)
     */
    private $nbheures = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="regieBureauRef", type="string", length=200, nullable=true)
     */
    private $regiebureauref;

    /**
     * @var string
     *
     * @ORM\Column(name="etudRef", type="string", length=80, nullable=false)
     */
    private $etudref;

    /**
     * @var string
     *
     * @ORM\Column(name="tuteurRef", type="string", length=80, nullable=true)
     */
    private $tuteurref;

    /**
     * @var string
     *
     * @ORM\Column(name="referentRef", type="string", length=200, nullable=true)
     */
    private $referentref;

    /**
     * @var string
     *
     * @ORM\Column(name="referentRef2", type="string", length=200, nullable=false)
     */
    private $referentref2 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="opcaRef", type="string", length=20, nullable=true)
     */
    private $opcaref = '__sans opca__';

    /**
     * @var string
     *
     * @ORM\Column(name="typeContrat", type="string", length=5, nullable=true)
     */
    private $typecontrat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="debutContrat", type="date", nullable=true)
     */
    private $debutcontrat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finContrat", type="date", nullable=true)
     */
    private $fincontrat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="accordOPCA", type="date", nullable=true)
     */
    private $accordopca;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="signatureContrat", type="date", nullable=true)
     */
    private $signaturecontrat;

    /**
     * @var string
     *
     * @ORM\Column(name="alternanceCle", type="string", length=80, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $alternancecle;

    /**
     * @var string
     *
     * @ORM\Column(name="sudesRef", type="string", length=20, nullable=true)
     */
    private $sudesref;

    /**
     * @var integer
     *
     * @ORM\Column(name="notifAttribTuteur", type="integer", nullable=true)
     */
    private $notifattribtuteur;

    /**
     * @var string
     *
     * @ORM\Column(name="bureauRef", type="string", length=200, nullable=false)
     */
    private $bureauref = '';

    /**
     * @var string
     *
     * @ORM\Column(name="regieReferentRef", type="string", length=80, nullable=true)
     */
    private $regiereferentref;

    /**
     * @var string
     *
     * @ORM\Column(name="regieReferentRef2", type="string", length=80, nullable=true)
     */
    private $regiereferentref2;



    /**
     * Set anneecle
     *
     * @param integer $anneecle
     * @return Contrat
     */
    public function setAnneecle($anneecle)
    {
        $this->anneecle = $anneecle;

        return $this;
    }

    /**
     * Get anneecle
     *
     * @return integer 
     */
    public function getAnneecle()
    {
        return $this->anneecle;
    }

    /**
     * Set nbheures
     *
     * @param integer $nbheures
     * @return Contrat
     */
    public function setNbheures($nbheures)
    {
        $this->nbheures = $nbheures;

        return $this;
    }

    /**
     * Get nbheures
     *
     * @return integer 
     */
    public function getNbheures()
    {
        return $this->nbheures;
    }

    /**
     * Set regiebureauref
     *
     * @param string $regiebureauref
     * @return Contrat
     */
    public function setRegiebureauref($regiebureauref)
    {
        $this->regiebureauref = $regiebureauref;

        return $this;
    }

    /**
     * Get regiebureauref
     *
     * @return string 
     */
    public function getRegiebureauref()
    {
        return $this->regiebureauref;
    }

    /**
     * Set etudref
     *
     * @param string $etudref
     * @return Contrat
     */
    public function setEtudref($etudref)
    {
        $this->etudref = $etudref;

        return $this;
    }

    /**
     * Get etudref
     *
     * @return string 
     */
    public function getEtudref()
    {
        return $this->etudref;
    }

    /**
     * Set tuteurref
     *
     * @param string $tuteurref
     * @return Contrat
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
     * Set referentref
     *
     * @param string $referentref
     * @return Contrat
     */
    public function setReferentref($referentref)
    {
        $this->referentref = $referentref;

        return $this;
    }

    /**
     * Get referentref
     *
     * @return string 
     */
    public function getReferentref()
    {
        return $this->referentref;
    }

    /**
     * Set referentref2
     *
     * @param string $referentref2
     * @return Contrat
     */
    public function setReferentref2($referentref2)
    {
        $this->referentref2 = $referentref2;

        return $this;
    }

    /**
     * Get referentref2
     *
     * @return string 
     */
    public function getReferentref2()
    {
        return $this->referentref2;
    }

    /**
     * Set opcaref
     *
     * @param string $opcaref
     * @return Contrat
     */
    public function setOpcaref($opcaref)
    {
        $this->opcaref = $opcaref;

        return $this;
    }

    /**
     * Get opcaref
     *
     * @return string 
     */
    public function getOpcaref()
    {
        return $this->opcaref;
    }

    /**
     * Set typecontrat
     *
     * @param string $typecontrat
     * @return Contrat
     */
    public function setTypecontrat($typecontrat)
    {
        $this->typecontrat = $typecontrat;

        return $this;
    }

    /**
     * Get typecontrat
     *
     * @return string 
     */
    public function getTypecontrat()
    {
        return $this->typecontrat;
    }

    /**
     * Set debutcontrat
     *
     * @param \DateTime $debutcontrat
     * @return Contrat
     */
    public function setDebutcontrat($debutcontrat)
    {
        $this->debutcontrat = $debutcontrat;

        return $this;
    }

    /**
     * Get debutcontrat
     *
     * @return \DateTime 
     */
    public function getDebutcontrat()
    {
        return $this->debutcontrat;
    }

    /**
     * Set fincontrat
     *
     * @param \DateTime $fincontrat
     * @return Contrat
     */
    public function setFincontrat($fincontrat)
    {
        $this->fincontrat = $fincontrat;

        return $this;
    }

    /**
     * Get fincontrat
     *
     * @return \DateTime 
     */
    public function getFincontrat()
    {
        return $this->fincontrat;
    }

    /**
     * Set accordopca
     *
     * @param \DateTime $accordopca
     * @return Contrat
     */
    public function setAccordopca($accordopca)
    {
        $this->accordopca = $accordopca;

        return $this;
    }

    /**
     * Get accordopca
     *
     * @return \DateTime 
     */
    public function getAccordopca()
    {
        return $this->accordopca;
    }

    /**
     * Set signaturecontrat
     *
     * @param \DateTime $signaturecontrat
     * @return Contrat
     */
    public function setSignaturecontrat($signaturecontrat)
    {
        $this->signaturecontrat = $signaturecontrat;

        return $this;
    }

    /**
     * Get signaturecontrat
     *
     * @return \DateTime 
     */
    public function getSignaturecontrat()
    {
        return $this->signaturecontrat;
    }

    /**
     * Get alternancecle
     *
     * @return string 
     */
    public function getAlternancecle()
    {
        return $this->alternancecle;
    }

    /**
     * Set sudesref
     *
     * @param string $sudesref
     * @return Contrat
     */
    public function setSudesref($sudesref)
    {
        $this->sudesref = $sudesref;

        return $this;
    }

    /**
     * Get sudesref
     *
     * @return string 
     */
    public function getSudesref()
    {
        return $this->sudesref;
    }

    /**
     * Set notifattribtuteur
     *
     * @param integer $notifattribtuteur
     * @return Contrat
     */
    public function setNotifattribtuteur($notifattribtuteur)
    {
        $this->notifattribtuteur = $notifattribtuteur;

        return $this;
    }

    /**
     * Get notifattribtuteur
     *
     * @return integer 
     */
    public function getNotifattribtuteur()
    {
        return $this->notifattribtuteur;
    }

    /**
     * Set bureauref
     *
     * @param string $bureauref
     * @return Contrat
     */
    public function setBureauref($bureauref)
    {
        $this->bureauref = $bureauref;

        return $this;
    }

    /**
     * Get bureauref
     *
     * @return string 
     */
    public function getBureauref()
    {
        return $this->bureauref;
    }

    /**
     * Set regiereferentref
     *
     * @param string $regiereferentref
     * @return Contrat
     */
    public function setRegiereferentref($regiereferentref)
    {
        $this->regiereferentref = $regiereferentref;

        return $this;
    }

    /**
     * Get regiereferentref
     *
     * @return string 
     */
    public function getRegiereferentref()
    {
        return $this->regiereferentref;
    }

    /**
     * Set regiereferentref2
     *
     * @param string $regiereferentref2
     * @return Contrat
     */
    public function setRegiereferentref2($regiereferentref2)
    {
        $this->regiereferentref2 = $regiereferentref2;

        return $this;
    }

    /**
     * Get regiereferentref2
     *
     * @return string 
     */
    public function getRegiereferentref2()
    {
        return $this->regiereferentref2;
    }
}
