<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Process\Process;

$process = new Process('ping -c 4 twitter.com'); 
$process->run();

if($process->isSuccessful()) {
  $output = $process->getOutput();
  $pattern = "/time=([\d\.]+) ms/m"; 
  
  preg_match_all($pattern, $output, $matches); 
  
  $average = array_sum($matches[1])/count($matches[1]);
  printf("Avergage time=%.3f ms", $average); 
}else{
  print "Twitter is offline";
}
print "\n";

