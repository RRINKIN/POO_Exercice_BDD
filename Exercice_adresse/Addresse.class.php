<?php
class Addresse {
    // Attributes
    private $id;
    private $rue;
    private $numero;
    private $localite;
    private $codePostal;
    private $pays;   

    // Constructeur
    public function __construct(){
    }

    // Getters et setters
    public function getId(){
        return $this->id;
    }
    public function setRue($rue){
        $this-> rue = $rue;
    }
    public function getRue(){
        return $this->rue;
    }
    public function setNumero($numero){
        $this-> numero = $numero;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function setLocalite($localite){
        $this-> localite = $localite;
    }
    public function getLocalite(){
        return $this->localite;
    }
    public function setCodePostal($codePostal){
        $this-> codePostal = $codePostal;
    }
    public function getCodePostal(){
        return $this->codePostal;
    }
    public function setPays($pays){
        $this-> pays = $pays;
    }
    public function getPays(){
        return $this->pays;
    }
}
?>