<?php
// Load classes
function loadClass($class) {
    require $class . ".class.php";
    }    
spl_autoload_register('loadClass');

/*
// delete a specific address from DB
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$addresseManager = new AddresseManager($connexion);
$addresses = $addresseManager->delete(5);
*/

/*
// create a specific address in DB
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$addresseManager = new AddresseManager($connexion);
$newAddresse = new Addresse();
$newAddresse->setRue("rueTest");
$newAddresse->setNumero("0");
$newAddresse->setLocalite("localiteTest");
$newAddresse->setCodePostal("codePostalTest");
$newAddresse->setPays("paysTest");
$createdAddresse = $addresseManager->create($newAddresse);
*/

// update a specific address in DB
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$addresseManager = new AddresseManager($connexion);
$newAddresse = $addresseManager->read(6);
$newAddresse->setRue("rueTest2");
$newAddresse->setNumero("0");
$newAddresse->setLocalite("localiteTest2");
$newAddresse->setCodePostal("codePostalTest2");
$newAddresse->setPays("paysTest2");
$addresseManager->update($newAddresse);
var_dump($newAddresse);

/*
// readAll entire DB
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$addresseManager = new AddresseManager($connexion);
$addresses = $addresseManager->readAll();
echo "<pre>";
var_dump($addresses);
echo "</pre>";
*/


// read a specific address from DB
$connexion = new PDO('mysql:host=localhost;dbname=poo_php', 'root', 'root');
$addresseManager = new AddresseManager($connexion);
$addresses = $addresseManager->read(6);
echo "<pre>";
var_dump($addresses);
echo "</pre>";

?>