<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Validator\Validator; 
use Symfony\Component\Validator\ConstraintValidatorFactory; 
use Symfony\Component\Validator\Mapping\ClassMetadataFactory; 
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Mapping\Loader\YamlFileLoader;
use Symfony\Component\Validator\Constraints as Asserts;

$validator = new Validator(
  new ClassMetadataFactory(
    new YamlFileLoader(__DIR__.'/validate.yml')
  ), 
  new ConstraintValidatorFactory()
);

$person = new Person();

// First validation try
$person->age = "not_valid";

$errors = $validator->validate($person);
print $errors;
print "\n";

// Second validation try
$person->age = 9;
$errors = $validator->validate($person);
print $errors;
print "\n";

// Third validation try
$person->age = 100;
$errors = $validator->validate($person);
print $errors;
print "\n";

// Accesing the errors one by one
foreach($errors as $error)
{
  print $error->getMessage();
  print "\n";
}

class Person
{
  public $name;
  public $age;
}
