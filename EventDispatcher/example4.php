<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcher;

$dispatcher = new EventDispatcher();
$dispatcher->addListener('event.a', array('EventAListener', 'trigger'), 1);
$dispatcher->addListener('event.a', array('EventBListener', 'trigger'), 2);

$dispatcher->dispatch('event.a');

class EventBListener
{
  public static function trigger(Event $e)
  {
    echo __CLASS__." triggered by event ".$e->getName()."\n";
    $e->setName('event.modified'); 
  }
}

class EventAListener
{
  public static function trigger(Event $e)
  {
    echo __CLASS__." triggered by event ".$e->getName()."\n";
  }
}
