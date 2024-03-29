<?php

/*
 * Components Playground: Validator (Example 3)
 * 
 * Description:
 * This time we are validating a Person object. Notice that we are telling the
 * validator service to use the StaticMethodLoader to look for object constraints,
 * wich means that the validator service will try to execute Class::loadValidatorMetadata
 * to get this information.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Validator\Validator; 
use Symfony\Component\Validator\ConstraintValidatorFactory; 
use Symfony\Component\Validator\Mapping\ClassMetadataFactory; 
use Symfony\Component\Validator\Mapping\Loader\StaticMethodLoader;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Asserts;

$validator = new Validator(
  new ClassMetadataFactory( new StaticMethodLoader() ), 
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

class Person
{
  public $name;
  public $age;

  static function loadValidatorMetadata(ClassMetadata $metadata) {
    $metadata->addPropertyConstraint('name', new Asserts\NotBlank()) 
             ->addPropertyConstraint('age' , new Asserts\Min(array(
                 'limit'   => 18,
                 'message' => "You should be older"
               )))
             ->addPropertyConstraint('age' , new Asserts\Max(99));
  }
}
