<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
              ->files()
              ->name('*.yml')
              ->depth('1')
              ->in(__DIR__."/../");

foreach($iterator as $element)
{
  print $element->getFilename()."\n";
}
