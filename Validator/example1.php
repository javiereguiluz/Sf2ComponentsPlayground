<?php

/*
 * Components Playground: Validator (Example 1)
 * 
 * Description:
 * The Validator Component is usefull to validate data, but it even more insteresting
 * when you want to validate and object.
 * 
 * In this example we will see how to validate a given value the bad way, we just
 * want to see this in action.
 * 
 * The Validator Component is supercharged with 21 validators, 
 * https://github.com/symfony/symfony/tree/master/src/Symfony/Component/Validator/Constraints
 * 
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotNullValidator;

$validator = new NotNullValidator(); 
if(!$validator->isValid(null, new NotNull())) {
  print $validator->getMessageTemplate();  // ConstraintValidator
  print "\n"; 
}
