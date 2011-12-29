<?php

/*
 * Components Playground: Process (Example 1)
 * 
 * Description:
 * The Process Component is usefull when you want to execute a shell command. In
 * other words, it's like 'shell_exec' (<http://php.net/manual/en/function.shell-exec.php>) 
 * on steroids.
 * 
 * In this example we can check if twitter.com is up and running.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

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
