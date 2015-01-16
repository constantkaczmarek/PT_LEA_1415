<?php

namespace LEA\ProfBundle\Entity;

class ODM
{

    protected $etat;
    protected $nom ;
    protected $prenom;
    protected $civ;
    protected $objet ;
    protected $adresse;
    protected $pays;
    protected $lieu;
    protected $kmAller;


    protected $transportAller;
    protected $transportRetour;
    protected $transportAllerEscale;
    protected $transportRetourEscale;

    protected $transportTrain;
    protected $classe;
    protected $reduction;
    protected $moyenReductionTrain;

    protected $transportVoiture;
    protected $CV;
    protected $immatriculation;

    protected $transportVoitureLocation;
    protected $nbPersVoitureLocation;

    protected $transportAvion;
    protected $transportTaxi;
    protected $transportMetro;
    protected $transportVelo;


    protected $departDifferent;
    protected $departAller;
    protected $arriverAller;
    protected $dateAller;
    protected $horaireDepartAller;
    protected $horaireArriverAller;

    protected $escaleAller;
    protected $villeEscaleAller;
    protected $horaireDepartAllerEscale;
    protected $horaireArriverAllerEscale;


    protected $arriverRetour;
    protected $departRetour;
    protected $dateRetour;
    protected $dateRetourDifferente;
    protected $horaireDepartRetour;
    protected $horaireArriverRetour;

    protected $escaleRetour;
    protected $villeEscaleRetour;
    protected $horaireDepartRetourEscale;
    protected $horaireArriverRetourEscale;

    protected $frais;
    protected $observations;

    /**
     * @return mixed
     */
    public function getCV()
    {
        return $this->CV;
    }

    /**
     * @param mixed $CV
     */
    public function setCV($CV)
    {
        $this->CV = $CV;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getArriverAller()
    {
        return $this->arriverAller;
    }

    /**
     * @param mixed $arriverAller
     */
    public function setArriverAller($arriverAller)
    {
        $this->arriverAller = $arriverAller;
    }

    /**
     * @return mixed
     */
    public function getCiv()
    {
        return $this->civ;
    }

    /**
     * @param mixed $civ
     */
    public function setCiv($civ)
    {
        $this->civ = $civ;
    }

    /**
     * @return mixed
     */
    public function getDateAller()
    {
        return $this->dateAller;
    }

    /**
     * @param mixed $dateAller
     */
    public function setDateAller($dateAller)
    {
        $this->dateAller = $dateAller;
    }

    /**
     * @return mixed
     */
    public function getDateRetour()
    {
        return $this->dateRetour;
    }

    /**
     * @param mixed $dateRetour
     */
    public function setDateRetour($dateRetour)
    {
        $this->dateRetour = $dateRetour;
    }

    /**
     * @return mixed
     */
    public function getDateRetourDifferente()
    {
        return $this->dateRetourDifferente;
    }

    /**
     * @param mixed $dateRetourDifferente
     */
    public function setDateRetourDifferente($dateRetourDifferente)
    {
        $this->dateRetourDifferente = $dateRetourDifferente;
    }

    /**
     * @return mixed
     */
    public function getDepartDifferent()
    {
        return $this->departDifferent;
    }

    /**
     * @param mixed $departDifferent
     */
    public function setDepartDifferent($departDifferent)
    {
        $this->departDifferent = $departDifferent;
    }

    /**
     * @return mixed
     */
    public function getDepartRetour()
    {
        return $this->departRetour;
    }

    /**
     * @param mixed $departRetour
     */
    public function setDepartRetour($departRetour)
    {
        $this->departRetour = $departRetour;
    }

    /**
     * @return mixed
     */
    public function getEscaleAller()
    {
        return $this->escaleAller;
    }

    /**
     * @param mixed $escaleAller
     */
    public function setEscaleAller($escaleAller)
    {
        $this->escaleAller = $escaleAller;
    }

    /**
     * @return mixed
     */
    public function getEscaleRetour()
    {
        return $this->escaleRetour;
    }

    /**
     * @param mixed $escaleRetour
     */
    public function setEscaleRetour($escaleRetour)
    {
        $this->escaleRetour = $escaleRetour;
    }

    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return mixed
     */
    public function getFrais()
    {
        return $this->frais;
    }

    /**
     * @param mixed $frais
     */
    public function setFrais($frais)
    {
        $this->frais = $frais;
    }

    /**
     * @return mixed
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * @param mixed $immatriculation
     */
    public function setImmatriculation($immatriculation)
    {
        $this->immatriculation = $immatriculation;
    }

    /**
     * @return mixed
     */
    public function getKmAller()
    {
        return $this->kmAller;
    }

    /**
     * @param mixed $kmAller
     */
    public function setKmAller($kmAller)
    {
        $this->kmAller = $kmAller;
    }

    /**
     * @return mixed
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param mixed $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * @param mixed $objet
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * @param mixed $pays
     */
    public function setPays($pays)
    {
        $this->pays = $pays;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTransportAller()
    {
        return $this->transportAller;
    }

    /**
     * @param mixed $transportAller
     */
    public function setTransportAller($transportAller)
    {
        $this->transportAller = $transportAller;
    }

    /**
     * @return mixed
     */
    public function getTransportAllerEscale()
    {
        return $this->transportAllerEscale;
    }

    /**
     * @param mixed $transportAllerEscale
     */
    public function setTransportAllerEscale($transportAllerEscale)
    {
        $this->transportAllerEscale = $transportAllerEscale;
    }

    /**
     * @return mixed
     */
    public function getTransportAvion()
    {
        return $this->transportAvion;
    }

    /**
     * @param mixed $transportAvion
     */
    public function setTransportAvion($transportAvion)
    {
        $this->transportAvion = $transportAvion;
    }

    /**
     * @return mixed
     */
    public function getTransportRetour()
    {
        return $this->transportRetour;
    }

    /**
     * @param mixed $transportRetour
     */
    public function setTransportRetour($transportRetour)
    {
        $this->transportRetour = $transportRetour;
    }

    /**
     * @return mixed
     */
    public function getTransportRetourEscale()
    {
        return $this->transportRetourEscale;
    }

    /**
     * @param mixed $transportRetourEscale
     */
    public function setTransportRetourEscale($transportRetourEscale)
    {
        $this->transportRetourEscale = $transportRetourEscale;
    }

    /**
     * @return mixed
     */
    public function getTransportTaxi()
    {
        return $this->transportTaxi;
    }

    /**
     * @param mixed $transportTaxi
     */
    public function setTransportTaxi($transportTaxi)
    {
        $this->transportTaxi = $transportTaxi;
    }

    /**
     * @return mixed
     */
    public function getTransportTrain()
    {
        return $this->transportTrain;
    }

    /**
     * @param mixed $transportTrain
     */
    public function setTransportTrain($transportTrain)
    {
        $this->transportTrain = $transportTrain;
    }

    /**
     * @return mixed
     */
    public function getTransportVoiture()
    {
        return $this->transportVoiture;
    }

    /**
     * @param mixed $transportVoiture
     */
    public function setTransportVoiture($transportVoiture)
    {
        $this->transportVoiture = $transportVoiture;
    }

    /**
     * @return mixed
     */
    public function getTransportVoitureLocation()
    {
        return $this->transportVoitureLocation;
    }

    /**
     * @param mixed $transportVoitureLocation
     */
    public function setTransportVoitureLocation($transportVoitureLocation)
    {
        $this->transportVoitureLocation = $transportVoitureLocation;
    }

    /**
     * @return mixed
     */
    public function getDepartAller()
    {
        return $this->departAller;
    }

    /**
     * @param mixed $departAller
     */
    public function setDepartAller($departAller)
    {
        $this->departAller = $departAller;
    }

    /**
     * @return mixed
     */
    public function getArriverRetour()
    {
        return $this->arriverRetour;
    }

    /**
     * @param mixed $arriverRetour
     */
    public function setArriverRetour($arriverRetour)
    {
        $this->arriverRetour = $arriverRetour;
    }

    /**
     * @return mixed
     */
    public function getHoraireDepartAller()
    {
        return $this->horaireDepartAller;
    }

    /**
     * @param mixed $horaireDepartAller
     */
    public function setHoraireDepartAller($horaireDepartAller)
    {
        $this->horaireDepartAller = $horaireDepartAller;
    }

    /**
     * @return mixed
     */
    public function getHoraireArriverAller()
    {
        return $this->horaireArriverAller;
    }

    /**
     * @param mixed $horaireArriverAller
     */
    public function setHoraireArriverAller($horaireArriverAller)
    {
        $this->horaireArriverAller = $horaireArriverAller;
    }

    /**
     * @return mixed
     */
    public function getHoraireDepartRetour()
    {
        return $this->horaireDepartRetour;
    }

    /**
     * @param mixed $horaireDepartRetour
     */
    public function setHoraireDepartRetour($horaireDepartRetour)
    {
        $this->horaireDepartRetour = $horaireDepartRetour;
    }

    /**
     * @return mixed
     */
    public function getHoraireArriverRetour()
    {
        return $this->horaireArriverRetour;
    }

    /**
     * @param mixed $horaireArriverRetour
     */
    public function setHoraireArriverRetour($horaireArriverRetour)
    {
        $this->horaireArriverRetour = $horaireArriverRetour;
    }

    /**
     * @return mixed
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * @param mixed $observations
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;
    }
    /**
     * @return mixed
     */
    public function getTransportMetro()
    {
        return $this->transportMetro;
    }

    /**
     * @param mixed $transportMetro
     */
    public function setTransportMetro($transportMetro)
    {
        $this->transportMetro = $transportMetro;
    }

    /**
     * @return mixed
     */
    public function getTransportVelo()
    {
        return $this->transportVelo;
    }

    /**
     * @param mixed $transportVelo
     */
    public function setTransportVelo($transportVelo)
    {
        $this->transportVelo = $transportVelo;
    }

    /**
     * @return mixed
     */
    public function getVilleEscaleAller()
    {
        return $this->villeEscaleAller;
    }

    /**
     * @param mixed $villeEscaleAller
     */
    public function setVilleEscaleAller($villeEscaleAller)
    {
        $this->villeEscaleAller = $villeEscaleAller;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }

    /**
     * @return mixed
     */
    public function getHoraireArriverAllerEscale()
    {
        return $this->horaireArriverAllerEscale;
    }

    /**
     * @param mixed $horaireArriverAllerEscale
     */
    public function setHoraireArriverAllerEscale($horaireArriverAllerEscale)
    {
        $this->horaireArriverAllerEscale = $horaireArriverAllerEscale;
    }

    /**
     * @return mixed
     */
    public function getHoraireArriverRetourEscale()
    {
        return $this->horaireArriverRetourEscale;
    }

    /**
     * @param mixed $horaireArriverRetourEscale
     */
    public function setHoraireArriverRetourEscale($horaireArriverRetourEscale)
    {
        $this->horaireArriverRetourEscale = $horaireArriverRetourEscale;
    }

    /**
     * @return mixed
     */
    public function getHoraireDepartAllerEscale()
    {
        return $this->horaireDepartAllerEscale;
    }

    /**
     * @param mixed $horaireDepartAllerEscale
     */
    public function setHoraireDepartAllerEscale($horaireDepartAllerEscale)
    {
        $this->horaireDepartAllerEscale = $horaireDepartAllerEscale;
    }

    /**
     * @return mixed
     */
    public function getHoraireDepartRetourEscale()
    {
        return $this->horaireDepartRetourEscale;
    }

    /**
     * @param mixed $horaireDepartRetourEscale
     */
    public function setHoraireDepartRetourEscale($horaireDepartRetourEscale)
    {
        $this->horaireDepartRetourEscale = $horaireDepartRetourEscale;
    }

    /**
     * @return mixed
     */
    public function getMoyenReductionTrain()
    {
        return $this->moyenReductionTrain;
    }

    /**
     * @param mixed $moyenReductionTrain
     */
    public function setMoyenReductionTrain($moyenReductionTrain)
    {
        $this->moyenReductionTrain = $moyenReductionTrain;
    }

    /**
     * @return mixed
     */
    public function getNbPersVoitureLocation()
    {
        return $this->nbPersVoitureLocation;
    }

    /**
     * @param mixed $nbPersVoitureLocation
     */
    public function setNbPersVoitureLocation($nbPersVoitureLocation)
    {
        $this->nbPersVoitureLocation = $nbPersVoitureLocation;
    }

    /**
     * @return mixed
     */
    public function getReduction()
    {
        return $this->reduction;
    }

    /**
     * @param mixed $reduction
     */
    public function setReduction($reduction)
    {
        $this->reduction = $reduction;
    }

    /**
     * @return mixed
     */
    public function getVilleEscaleRetour()
    {
        return $this->villeEscaleRetour;
    }

    /**
     * @param mixed $villeEscaleRetour
     */
    public function setVilleEscaleRetour($villeEscaleRetour)
    {
        $this->villeEscaleRetour = $villeEscaleRetour;
    }
}