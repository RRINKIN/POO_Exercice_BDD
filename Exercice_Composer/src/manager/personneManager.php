<?php
// Defining a namespace
namespace Poo\ExempleComposer\manager;

// Declaring the classes to be used
use Poo\ExempleComposer\entity\personne;
use faker;

// generate fake people using faker: PersonneManager::create($nombre)
class personneManager{
    // constructor
    public function __construct(){
    }

    // other functions
    public function create(){
        $faker = Faker\Factory::create();
        $faker->name();
        $faker->firstName();
        $faker->streetAddress();
        $faker->postcode();
        $faker->country();
        $faker->company();
        return $faker;
    }
}
?>