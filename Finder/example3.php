<?php

/*
 * Components Playground: Finder (Example 3)
 * 
 * Description:
 * Just another exiciting example. This time we are finding just the directories
 * in the parent directory and sorting them by name. Also, we are excluding the
 * 'lib' directory thanks to the filter method.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
              ->directories()
              ->sortByName()
              ->depth(0)
              ->filter(function(\SplFileInfo $file){
                  return $file->getFilename() !== 'lib';
                })
              ->in(__DIR__.'/../');

foreach($iterator as $element)
{
  print $element->getFilename()."\n";
}
