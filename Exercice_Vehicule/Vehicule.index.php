<?php
// Load classes
function loadClass($class) {
    require $class . ".class.php";
    }    
spl_autoload_register('loadClass');

// Interrogation de la base de donnée et présentation sous forme de tableau
// Création de l'objet se fait via le constructeur.
/*try {
    $connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
    $resultat = $connexion->query("select * from vehicules");
    echo "<table>";
    echo "<tr><th>Id</th><th>Marque</th><th>Modèle</th><th>Nb Portes</th><th>Vitesse</th>"; 
    while ($donnees = $resultat->fetch(PDO::FETCH_ASSOC)) {
        $vehicule = new Vehicule($donnees);
        echo "<tr>";
        echo "<td>" . $vehicule->getId() . "</td>";
        echo "<td>" . $vehicule->getMarque() . "</td>"; 
        echo "<td>" . $vehicule->getModele() . "</td>"; 
        echo "<td>" . $vehicule->getNbPortes() . "</td>"; 
        echo "<td>" . $vehicule->getVitesse() . "</td>"; 
        echo "</tr>";
    }
    echo "</table>";
    } 
catch (Exception $exc) {
    die('Erreur : ' . $exc->getMessage());
}*/

// Hydratation directe via le PDO statement
// Pas de constructeur nécessaire
/*$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$stmt = $connexion->prepare("SELECT * FROM vehicules WHERE id = 1");
$stmt->setFetchMode(PDO::FETCH_CLASS, 'Vehicule');
$stmt->execute();
$vehicule = $stmt->fetch(PDO::FETCH_CLASS);
var_dump($vehicule);*/

/*// Consultation d'un véhicule
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$vehiculeManager = new VehiculeManager($connexion);
var_dump($vehiculeManager->read("1"));
echo "</br>";
echo "*************";
echo "</br>";*/

// consultation de tous les véhicules
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$vehiculeManager = new VehiculeManager($connexion);
$vehicules = $vehiculeManager->readAll();

// affichage du retour PDO
/*echo "<pre>";
print_r($vehicules);
echo "</pre>";*/

// Visualisation de l'objet sous forme de tableau.
echo "</br>";
echo "<table>";
echo "<thead>";
echo "<tr>"; 
echo "<th>ID</th>";
echo "<th>MARQUE</th>";
echo "<th>MODELE</th>";
echo "<th>nBPORTES</th>";
echo "<th>VITESSE</th>";
echo "<th>UPDATE</th>";
echo "<th>DELETE</th>";
echo "</tr>";
echo "</thead>";
foreach ($vehicules as $vehicule) {
    echo "<tr>"; 
    echo "<td>" . $vehicule->getId() . "</td>";
    echo "<td>" . $vehicule->getMarque() . "</td>"; 
    echo "<td>" . $vehicule->getModele() . "</td>"; 
    echo "<td>" . $vehicule->getNbPortes() . "</td>"; 
    echo "<td>" . $vehicule->getVitesse() . "</td>"; 
    echo "<td><a href='Vehicule.update.php?id=".$vehicule->getId()."'> UPDATE </a></td>"; 
    echo "<td><a href='Vehicule.delete.php?id=".$vehicule->getId()."'> DELETE </a></td>";
    echo "</tr>";
}
echo "</table>";
echo "<td><a href='Vehicule.create.php'> CREATE </a></td>";
?>



