<?php

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
