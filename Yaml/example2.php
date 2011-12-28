<?php

/*
 * Components Playground: YAML (Example 2)
 * 
 * Description:
 * In this example we see how to parse a YAML file.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Yaml\Yaml;

$data = Yaml::parse('sample.yml');

print $data['description']; 
print "\n";

foreach( $data['users'] as $user){
  print $user['name']." ".$user['surname'];
  print "\n";
}
