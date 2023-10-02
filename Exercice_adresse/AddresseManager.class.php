<?php
class AddresseManager {
    // fonction de connexion à la DB
    private $connexion = null;
    public function __construct($connex){
        $this->connexion = $connex; 
    }
    public function setConnexion($connex){
        $this->connexion = $connex;
    }
    public function getConnexion(){
        return $this->connexion;
    }

    // fonction de lecture de toutes les addresses
    public function readAll(){
        $stmt = $this->getConnexion()->prepare("SELECT * FROM Addresse");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Addresse');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // fonction de lecture d'une seule addresse
    public function read($id){
        $stmt = $this->getConnexion()->prepare("SELECT * FROM Addresse WHERE id=?");
        $stmt->setFetchMode(PDO::FETCH_CLASS,'Addresse');
        $stmt->execute([$id]);
        $returnedArray = $stmt->fetchAll();
        return $returnedArray[0];
    }

    // fonction de création d'une addresse
    public function create(Addresse $addresse){
        $stmt = $this->getConnexion()->prepare("INSERT INTO Addresse (rue, numero, localite, codePostal, pays) VALUES (?,?,?,?,?)");
        $stmt->execute([$addresse->getRue(), $addresse->getNumero(), $addresse->getLocalite(), $addresse->getCodePostal(), $addresse->getPays()]);
    }

    // fonction de suppression d'une addresse
    public function delete($idAddresse){
        $stmt= $this->getConnexion()->prepare("DELETE FROM Addresse WHERE id=?");
        $stmt->execute([$idAddresse]);
    }

    // fonction d'update d'une addresse
    public function update(Addresse $addresse){
        $stmt = $this->getConnexion()->prepare("UPDATE Addresse SET rue=?, numero=?, localite=?, codePostal=?, pays=? WHERE id=?");
        $stmt->execute([$addresse->getRue(), $addresse->getNumero(), $addresse->getLocalite(), $addresse->getCodePostal(), $addresse->getPays(), $addresse->getId()]);
    }
}

?>