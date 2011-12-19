<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Yaml\Yaml;

Yaml::enablePhpParsing();

$data = Yaml::parse('sample_with_php.yml'); 
print_r($data);
