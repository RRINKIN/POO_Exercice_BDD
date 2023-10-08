<?php
// Composer autoloader with: require 'vendor/autoload.php';
require 'vendor/autoload.php';
use Poo\ExempleComposer\manager\personneManager;

// affichage
$number = 5;
$newPersonne = new personneManager();
$testPersonne = $newPersonne->create($number);
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
}
echo "</tbody>";
echo "</table>";
?>