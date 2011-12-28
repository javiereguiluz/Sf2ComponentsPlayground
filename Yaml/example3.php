<?php

/*
 * Components Playground: YAML (Example 3)
 * 
 * Description:
 * So you would like to combine YAML and PHP, no? Go and take a look at this
 * example to see how to do this, the magic happens at line 18.
 * 
 * Important. New lines and tabs are needed to parse YAML properly. Notice that
 * we had to add some \n manually in sample_with_php.yml.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Yaml\Yaml;

Yaml::enablePhpParsing();

$data = Yaml::parse('sample_with_php.yml'); 
print_r($data);
