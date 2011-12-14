<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Validator\Validator; 
use Symfony\Component\Validator\ConstraintValidatorFactory; 
use Symfony\Component\Validator\Mapping\BlackholeMetadataFactory; 
use Symfony\Component\Validator\Constraints as Asserts;

$validator = new Validator( 
  new BlackholeMetadataFactory,
  new ConstraintValidatorFactory
);

$errors = $validator->validateValue('', new Asserts\NotBlank()); 
if($errors->count()) {
  print $errors;
}
