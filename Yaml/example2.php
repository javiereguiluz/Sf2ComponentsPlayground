<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Yaml\Yaml;

$data = Yaml::parse('sample.yml');

print $data['description']; 
print "\n";

foreach( $data['users'] as $user){
  print $user['name']." ".$user['surname'];
  print "\n";
}
