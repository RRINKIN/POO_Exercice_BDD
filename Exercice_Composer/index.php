<?php
// Composer autoloader with: require 'vendor/autoload.php';
require 'vendor/autoload.php';

// use FakerPHP to generate personnes
// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
echo $faker->name();
echo $faker->firstName();
echo $faker->streetAddress();
echo $faker->postcode();
echo $faker->country();
echo $faker->company();
?>