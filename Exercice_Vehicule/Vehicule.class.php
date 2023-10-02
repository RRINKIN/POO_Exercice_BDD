<?php
class Vehicule {
    // Attributes
    private $id;
    private $marque;
    private $modele;
    private $nbPortes;
    private $vitesse;

    // Constructor
    // Ce constructeur prend en paramètre un tableau fourni par la DB.
    // Attention à l'index utilisé
    public function __construct($donneesVoiture = []) {
        if (isset($donneesVoiture["marque"])) {
            $this->marque = $donneesVoiture["marque"];
        }
        if (isset($donneesVoiture["modele"])) {
            $this->modele = $donneesVoiture["modele"];
        }
        if (isset($donneesVoiture["nbPortes"])) {
            $this->nbPortes = $donneesVoiture["nbPortes"];
        }
        if (isset($donneesVoiture["vitesse"])) {
            $this->vitesse = $donneesVoiture["vitesse"];
        }
    }

    // Setters & Getters
    // setID supprimé car la DB s'occupe de la gestion des ID
    public function getId(){
        return $this->id;
    }

    public function setMarque($marqueVehicule){
        $this->marque = $marqueVehicule;
    }
    public function getMarque(){
        return $this->marque;
    }

    public function setModele($modeleVehicule){
        $this->modele = $modeleVehicule;
    }
    public function getModele(){
        return $this->modele;
    }

    public function setNbPortes($portesVehicule){
        $this->nbPortes = $portesVehicule;
    }
    public function getNbPortes(){
        return $this->nbPortes;
    }

    public function setVitesse($vitesseVehicule){
        $this->vitesse = $vitesseVehicule;
    }
    public function getVitesse(){
        return $this->vitesse;
    }

    // Méthode d'hydratation directe via le PDO statement.
    // Permet d'alimenter l'objet par d'autres moyens que le constructeur.
    public function hydrate(array $dataVoiture){
        foreach ($dataVoiture as $cle => $valeur){
            $nomMethode = "set".ucfirst($cle);
            if (method_exists($this, $nomMethode)){
                $this -> $nomMethode($valeur);
            }
        }
    }
}
?>