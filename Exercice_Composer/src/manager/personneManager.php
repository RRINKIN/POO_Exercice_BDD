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

    public function getAll (personne $personne){
        $stmt = $this->getConnexion()->prepare("INSERT INTO personnes (nom, prenom, adresse, codePostal, pays, societe) VALUES (:nom,:prenom,:adresse,:codePostal,:pays,:societe)");
        $stmt->bindValue(':nom', $personne->getName(), \PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $personne->getPrenom(), \PDO::PARAM_STR);
        $stmt->bindValue(':adresse', $personne->getAdresse(), \PDO::PARAM_STR);
        $stmt->bindValue(':codePostal', $personne->getPostalCode(), \PDO::PARAM_STR);
        $stmt->bindValue(':pays', $personne->getPays(), \PDO::PARAM_STR);
        $stmt->bindValue(':societe', $personne->getSociete(), \PDO::PARAM_STR);
        $stmt->execute();
    }
}
?>