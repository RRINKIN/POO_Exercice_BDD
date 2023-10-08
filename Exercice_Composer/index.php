<?php
// Composer autoloader with: require 'vendor/autoload.php';
require 'vendor/autoload.php';
use Poo\ExempleComposer\manager\personneManager;

// affichage
$newPersonne = new personneManager();
$testPersonne = $newPersonne->create();
echo $testPersonne;
?>