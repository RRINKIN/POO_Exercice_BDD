<?php
// Defining a namespace
namespace Poo\ExempleComposer\manager;

// Declaring the classes to be used
use Poo\ExempleComposer\entity\personne;
use Faker\Factory;

// generate fake people
class personneManager{
    // connction to DB
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

    // Function faker
    public function create($number){
        $personnes = [];
        $faker = Factory::create();
        for ($i=0; $i<$number; $i++){
            $personne = new personne();
            $personne->setName($faker->name());
            $personne->setPrenom($faker->firstName());
            $personne->setAdresse($faker->streetAddress());
            $personne->setPostalCode($faker->postcode());
            $personne->setPays($faker->country());
            $personne->setSociete($faker->company());
            array_push($personnes, $personne);
        }    
        return $personnes;
    }

    // Functions CRUD
    public function insert (personne $personne){
        $stmt = $this->getConnexion()->prepare("INSERT INTO personnes (nom, prenom, adresse, codePostal, pays, societe) VALUES (:nom,:prenom,:adresse,:codePostal,:pays,:societe)");
        $stmt->bindValue(':nom', $personne->getName(), \PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $personne->getPrenom(), \PDO::PARAM_STR);
        $stmt->bindValue(':adresse', $personne->getAdresse(), \PDO::PARAM_STR);
        $stmt->bindValue(':codePostal', $personne->getPostalCode(), \PDO::PARAM_STR);
        $stmt->bindValue(':pays', $personne->getPays(), \PDO::PARAM_STR);
        $stmt->bindValue(':societe', $personne->getSociete(), \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function readAll(){
        $stmt = $this->getConnexion()->prepare("SELECT * FROM personnes");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'personne');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }

    public function read($idPersonne){
        $stmt = $this->getConnexion()->prepare("SELECT * FROM personnes WHERE id = $idPersonne");
        $stmt->setFetchMode(\PDO::FETCH_CLASS, 'personne');
        $stmt->execute();
        $personne = $stmt->fetch(\PDO::FETCH_CLASS);
        return $personne;
    }

    public function update(personne $personne){
        $stmt = $this->getConnexion()->prepare("INSERT INTO personnes (nom, prenom, adresse, codePostal, pays, societe) VALUES (:nom,:prenom,:adresse,:codePostal,:pays,:societe)");
        $stmt->bindValue(':nom', $personne->getName(), \PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $personne->getPrenom(), \PDO::PARAM_STR);
        $stmt->bindValue(':adresse', $personne->getAdresse(), \PDO::PARAM_STR);
        $stmt->bindValue(':codePostal', $personne->getPostalCode(), \PDO::PARAM_STR);
        $stmt->bindValue(':pays', $personne->getPays(), \PDO::PARAM_STR);
        $stmt->bindValue(':societe', $personne->getSociete(), \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete($idPersonne){
        $stmt= $this->getConnexion()->prepare("DELETE FROM personnes WHERE id=?");
        $stmt->execute([$idPersonne]);
    }
}
?>