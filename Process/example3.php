<?php

/*
 * Components Playground: Process (Example 3)
 * 
 * Description:
 * In this example we show only the response time (instead of all the information)
 * 
 * Notice that there is a big difference between this example and the previous one.
 * In the previous one we had to wait until the command is finished and then we
 * see the result.
 * Here, we see the screen updating as the command receives the information for 
 * the last ping.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Process\Process;

$process = new Process('ping -c 4 twitter.com'); 
$process->run(function($type, $buffer) {
  if('out' === $type){
    $pattern = '/time=([\d+\.]+) ms/'; 
    if(preg_match_all($pattern, $buffer, $matches)){;
      print $matches[0][0]."\n";
    } 
  }elseif( 'err' === $type ){
    print "Twitter is offline";
  } 
});
