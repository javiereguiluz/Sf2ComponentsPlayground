<?php

/*
 * Components Playground: Command (Example 3)
 * 
 * Description:
 * Adding a new task to the console, the good way.
 * 
 * So we can enjoy the OOP benefits, it's a good idea to create a new class for
 * every new task, this way, our code keeps cleaner and we can use some task to
 * create others thanks to inheritance.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";
require_once __DIR__."/Command/HelloCommand.php";

use Symfony\Component\Console\Application; 

$console = new Application();
$console->add(new HelloCommand());
$console->run();
