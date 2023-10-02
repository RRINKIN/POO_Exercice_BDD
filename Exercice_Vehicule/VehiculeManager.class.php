<?php
//namespace ISL_POO_FFRAMEWORK\POO_Exercice_BDD\Manager;

use Vehicule;

/**
* Description de VehiculeManager 
*/

class VehiculeManager {
/**
 * @var\PDO $connexion
 */
    private $connexion = null; //object PDO
    public function __construct($connex) {
        $this->connexion = $connex;
    }
    
    public function getConnexion(){
        return $this->connexion;
    }

    public function setConnexion($connexion){
        $this->connexion = $connexion;
    }

    public function create(Vehicule $vehicule){
        $stmt = $this->getConnexion()->prepare("INSERT INTO vehicules (marque, modele, nbPortes, vitesse) VALUES (?,?,?,?)");
        $stmt->execute([$vehicule->getMarque(), $vehicule->getModele(), $vehicule->getNbPortes(), $vehicule->getVitesse()]);
    }

    public function read($idVehicule){
        $stmt = $this->getConnexion()->prepare("SELECT * FROM vehicules WHERE id = $idVehicule");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vehicule');
        $stmt->execute();
        $vehicule = $stmt->fetch(PDO::FETCH_CLASS);
        return $vehicule;
    }

    public function readAll(){
        $stmt = $this->getConnexion()->prepare("SELECT * FROM vehicules");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Vehicule');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function update(Vehicule $vehicule){
        $stmt= $this->getConnexion()->prepare("UPDATE vehicules SET marque=?, modele=?, nbPortes=?, vitesse=? WHERE id=?");
        $stmt->execute([$vehicule->getMarque(), $vehicule->getModele(), $vehicule->getNbPortes(), $vehicule->getVitesse(), $vehicule->getId()]);
    }

    public function delete($idVehicule){
        $stmt= $this->getConnexion()->prepare("DELETE FROM vehicules WHERE id=?");
        $stmt->execute([$idVehicule]);
    }
}
?>