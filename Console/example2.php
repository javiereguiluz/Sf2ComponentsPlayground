<?php

/*
 * Components Playground: Command (Example 2)
 * 
 * Description:
 * Adding a new task to the console.
 * 
 * In this case, the task job is quite simple. It needs the name of the user as
 * the first and unique (and required) parameter and it outputs the username
 * preceed by 'Hello'.
 * 
 * Notice that we are using some special tags (<info>) to colorize the output.
 * There are four avaiable: <error>, <info>, <comment> and <question>.
 * 
 * To execute this task
 * > php example3.php hello
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Console\Application; 
use Symfony\Component\Console\Input\InputArgument;

$console = new Application(); 
$console
  ->register('hello')
  ->setDefinition(array(
      new InputArgument('name', InputArgument::REQUIRED, 'Name'),
    ))
  ->setDescription('It says hello to a person')
  ->setCode(function ($input, $output) {
      $name = $input->getArgument('name'); 
      $output->writeln(sprintf('Hello <info>%s</info>', $name));
    });
 
$console->run();
