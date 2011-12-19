<?php

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
