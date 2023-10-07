<?php
// Defining a namespace
//namespace Poo\ExempleComposer\manager;

// Declaring the classes to be used
//use Poo\ExempleComposer\entity\personne;

// generate fake people using faker: PersonneManager::create($nombre)
class personneManager{
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