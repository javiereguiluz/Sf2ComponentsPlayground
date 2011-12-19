<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
              ->date("> now -2 hours")
              ->in(__DIR__);

foreach($iterator as $element)
{
  print $element->getFilename()."\n";
}
