<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

$dispatcher = new EventDispatcher();
$dispatcher->addListener('event.a', array('EventAListener', 'trigger'));
$dispatcher->addListener('event.b', array('EventAListener', 'trigger'));

$dispatcher->dispatch('event.a');
sleep(1);
$dispatcher->dispatch('event.b');


class EventAListener
{
  public static function trigger(Event $e)
  {
    echo $e->getName()."\n";
  }
}
