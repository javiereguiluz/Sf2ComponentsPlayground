<?php

/*
 * Components Playground: YAML (Example 1)
 * 
 * Description:
 * The YAML components let us dump and parse YAML files, no more, no less.
 * 
 * In this example to we see how to dump an array in YAML format.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Yaml\Yaml;

$data['description'] = "Social and Mobile Team";
$data['users'][] = array(
  'name'    => 'Javi', 
  'surname' => 'Lopez'
);
$data['users'][] = array( 
  'name'    => 'Rob', 
  'surname' => 'Waring'
);
$data['users'][] = array( 
  'name'    => 'Nitin', 
  'surname' => 'Patel'
);

print Yaml::dump($data);
