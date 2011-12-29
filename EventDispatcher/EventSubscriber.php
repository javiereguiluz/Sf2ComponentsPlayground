<?php

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;

class EventSubscriber implements EventSubscriberInterface
{
  public static function getSubscribedEvents()
  {
    return array('event.a' => 'trigger');
  }

  public function trigger(Event $e)
  {
    echo $e->getName()."\n";
  }
}
