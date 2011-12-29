<?php

/*
 * Components Playground: Template (Example 1)
 * 
 * Description:
 * The Template Component is a template engine of which templates are written in plain
 * PHP (it doesn't use a special syntax like Smarty or Twig)
 * 
 * This code, except for the last line, load and setup the template engine.
 * 
 * A template engine needs:
 *  1. A loader, where do my templates live? (here, they live in the 'templates' directory)
 *  2. A name parser, it converts the logical name of the template to a TemplateRefernce object
 *  3. Helpers, we will see this in the next example. 
 * 
 * In a real project you should load and setup the engine only once, not everytime 
 * you want to render a template. So, a DIC is the best choice. Did it sound
 * familiar to you? ;)
 * $container->get('template')->render(...)
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

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
