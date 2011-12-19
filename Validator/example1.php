<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotNullValidator;

$validator = new NotNullValidator(); 
if(!$validator->isValid(null, new NotNull())) {
  print $validator->getMessageTemplate();
  print "\n"; 
}
