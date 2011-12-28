<?php

/*
 * Components Playground: Command (Example 1)
 * 
 * Description:
 * How to create the easiest console ever. To make it work just go to the
 * command line a type
 * > php example1.php
 * 
 * You will see a list of tasks available. To execute a task
 * > php example1.php taskname [parameters]
 * 
 * For example
 * > php example1.php help list
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Console\Application;

$console = new Application();
$console->run();
