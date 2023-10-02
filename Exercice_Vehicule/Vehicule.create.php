<?php
// Load classes
function loadClass($class) {
    require $class . ".class.php";
    }    
spl_autoload_register('loadClass');

// Création d'un nouveau véhicule
// Check si le formulaire a été posté en vérifiant sur le name est envoyé par POST
var_dump($_POST);
if (isset($_POST['créer'])){
    $nouveauVehicule = new Vehicule();
    $nouveauVehicule -> setMarque($_POST["marque"]);
    $nouveauVehicule -> setModele($_POST["modele"]);
    $nouveauVehicule -> setNbPortes($_POST["nbPortes"]);
    $nouveauVehicule -> setVitesse($_POST["vitesse"]);
    // Création via vehiculeManager
    $connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
    $vehiculeManager = new VehiculeManager($connexion);
    $vehiculeManager->create($nouveauVehicule); 
};
?>

<form action="Vehicule.create.php" method="POST">
    <label for="marque">Marque:</label><br>
    <input type="text" id="marque" name="marque" value=""><br>
    <label for="modele">Modele:</label><br>
    <input type="text" id="modele" name="modele" value=""><br>
    <label for="nbPortes">NbPorte:</label><br>
    <input type="number" id="nbPortes" name="nbPortes" value=""><br>
    <label for="vitesse">Vitesse:</label><br>
    <input type="number" id="vitesse" name="vitesse" value=""><br>
    <br>
    <input type="submit" id="créer" name="créer" value="créer"><br>
</form>