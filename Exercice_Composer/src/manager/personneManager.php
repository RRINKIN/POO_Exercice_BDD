<?php
// Defining a namespace
namespace Poo\ExempleComposer\manager;

// Declaring the classes to be used
use Poo\ExempleComposer\entity\personne;
use Faker\Factory;

// generate fake people
class personneManager{
    // constructor
    public function __construct(){
    }

    // other functions
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
}
?>