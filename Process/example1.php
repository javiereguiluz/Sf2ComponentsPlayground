<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Process\Process;

$process = new Process('ping -c 1 twitter.com');
$process->run();

if($process->isSuccessful()){
  print "Twitter is online"; 
}else{
  print "Twitter is offline";
}
print "\n";
