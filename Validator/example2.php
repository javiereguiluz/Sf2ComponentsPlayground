<?php

/*
 * Components Playground: Validator (Example 2)
 * 
 * Description:
 * The right way to do this is use the validation service and ask it for validating
 * things.
 * 
 * To create a validator service we need:
 *  (1) A MetadataFactory, needed to validate objects
 *  (2) A ConstraintValidatorFactory, needed to find the validator for a given
 *      constraint.
 * 
 * In this case, we are just using the validator service to validate values so we
 * use the BlackholeMetadataFactory.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Validator\Validator; 
use Symfony\Component\Validator\ConstraintValidatorFactory; 
use Symfony\Component\Validator\Mapping\BlackholeMetadataFactory; 
use Symfony\Component\Validator\Constraints as Asserts;

$validator = new Validator( 
  new BlackholeMetadataFactory,
  new ConstraintValidatorFactory
);

$errors = $validator->validateValue('', new Asserts\NotBlank()); //ConstraintViolationList 
if($errors->count()) {
  print $errors; // ConstraintViolation
}
