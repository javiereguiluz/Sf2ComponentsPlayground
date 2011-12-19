<?php

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
