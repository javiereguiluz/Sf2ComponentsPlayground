<?php

/*
 * Components Playground: Finder (Example 1)
 * 
 * Description:
 * This component allows you to find files and directories the easy way. You can
 * now forget about iterating inside directories, that belongs to the past!
 * 
 * In this example we find all the files and directories created less than 2
 * hours ago in this directory.
 * 
 * Notice: When you iterate, every element of this iterator is a SplFileInfo
 * object <http://php.net/manual/en/class.splfileinfo.php>
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
              ->date("> now -2 hours")
              ->in(__DIR__);

foreach($iterator as $element)
{
  print $element->getFilename()."\n";
}
