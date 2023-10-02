<?php
// Load classes
function loadClass($class) {
    require $class . ".class.php";
    }    
spl_autoload_register('loadClass');

// consultation de tous les véhicules
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$vehiculeManager = new VehiculeManager($connexion);
// récupérer l'ID dans l'URL du véhicule à mettre à jour
$idVehicule = $_GET["id"];
// Lire tous les attributs du véhicule en provenance de la DB
$vehicule = $vehiculeManager->read($idVehicule);
// Check si le formulaire a été posté en vérifiant sur le name est envoyé par POST
if (isset($_POST['modifier'])) {
    $vehicule->setMarque($_POST["marque"]);
    $vehicule->setModele($_POST["modele"]);
    $vehicule->setNbPortes($_POST["nbPortes"]);
    $vehicule->setVitesse($_POST["vitesse"]);
    // update via vehiculeManager
    $vehiculeManager->update($vehicule); 
}
var_dump($vehicule);
?>

<form action="Vehicule.update.php?id=<?php echo $idVehicule ?>" method="POST">
    <label for="marque">Marque:</label><br>
    <input type="text" id="marque" name="marque" value="<?php echo $vehicule->getMarque();?>"><br>
    <label for="modele">Modele:</label><br>
    <input type="text" id="modele" name="modele" value="<?php echo $vehicule->getModele();?>"><br>
    <label for="nbPortes">NbPorte:</label><br>
    <input type="number" id="nbPortes" name="nbPortes" value="<?php echo $vehicule->getNbPortes();?>"><br>
    <label for="vitesse">Vitesse:</label><br>
    <input type="number" id="vitesse" name="vitesse" value="<?php echo $vehicule->getVitesse();?>"><br>
    <br>
    <input type="submit" id="modifier" name="modifier" value="modifier"><br>
</form>