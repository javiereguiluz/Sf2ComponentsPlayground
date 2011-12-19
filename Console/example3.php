<?php

require_once __DIR__."/../autoload.php";
require_once __DIR__."/Command/HelloCommand.php";

use Symfony\Component\Console\Application; 

$console = new Application();
$console->add(new HelloCommand());
$console->run();
