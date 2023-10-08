<?php
// Serveur via le terminal - php -S localhost:9090
// Composer autoloader with: require 'vendor/autoload.php';
require 'vendor/autoload.php';
use Poo\ExempleComposer\manager\personneManager;

// connection to DB
$connexion = new PDO('mysql:host=localhost:8889;dbname=poo_php', 'root', 'root');

// utilisation de Faker
$number = 5;
$newPersonne = new personneManager($connexion);
$testPersonne = $newPersonne->create($number);
// Affichage de Faker
echo "<table>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>nom</th>";
            echo "<th>prénom</th>";
            echo "<th>adresse</th>";
            echo "<th>code postal</th>";
            echo "<th>pays</th>";
            echo "<th>société</th>";
        echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    /**
     * @var personne $personne
     */
    foreach ($testPersonne as $personne) {
        echo "<tr>";
            echo "<th>".$personne->getName()."</th>";
            echo "<th>".$personne->getPrenom()."</th>";
            echo "<th>".$personne->getAdresse()."</th>";
            echo "<th>".$personne->getPostalCode()."</th>";
            echo "<th>".$personne->getPays()."</th>";
            echo "<th>".$personne->getSociete()."</th>";
        echo "</tr>";
        //$newPersonne->insert($personne);
    }
    echo "</tbody>";
echo "</table>";

// Retourner toutes les personnes
$allPersonnes = $newPersonne->readAll();
var_dump($allPersonnes);
echo "</br>";
// Retourner une seule personne
$onePersonne = $newPersonne->read(1);
var_dump($onePersonne);

?>