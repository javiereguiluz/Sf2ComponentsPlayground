<?php

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
