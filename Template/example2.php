<?php

/*
 * Components Playground: Template (Example 2)
 * 
 * Description:
 * In this example we are decorating the template with a layout. In this case we
 * need to load a special helper, SlotHelper.
 * 
 * There are two helpers: Assets and Slots but you can create your own.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Templating\Loader\FilesystemLoader; 
use Symfony\Component\Templating\PhpEngine; 
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Helper\SlotsHelper;

$loader = new FilesystemLoader(
                array(__DIR__.'/templates/%name%.php')
          );
$parser = new TemplateNameParser();
$engine = new PhpEngine($parser, $loader, array(new SlotsHelper())); 

echo $engine->render('template2', array('name' => 'Javi'));
