<?php

require_once __DIR__."/../autoload.php";
require_once __DIR__."/EventSubscriber.php";

use Symfony\Component\EventDispatcher\EventDispatcher;

$dispatcher = new EventDispatcher();
$subscriber = new EventSubscriber(); 

$dispatcher->addSubscriber($subscriber);

$dispatcher->dispatch('event.a');
