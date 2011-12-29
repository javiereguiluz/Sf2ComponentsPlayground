<?php

/*
 * Components Playground: Finder (Example 2)
 * 
 * Description:
 * In this example we find all the YAML files (NOT directories), in the parent
 * directory.
 * 
 * Try to remove the depth constraint to see its effect, :).
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

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
