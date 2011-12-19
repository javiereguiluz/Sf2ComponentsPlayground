<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Templating\Loader\FilesystemLoader; 
use Symfony\Component\Templating\PhpEngine; 
use Symfony\Component\Templating\TemplateNameParser;

$loader = new FilesystemLoader(
                array(__DIR__.'/templates/%name%.php')
          );
$parser = new TemplateNameParser();
$engine = new PhpEngine($parser, $loader); 

echo $engine->render('template1', array('name' => 'Javi'));
