<?php

require_once __DIR__."/lib/vendor/symfony/src/Symfony/Component/ClassLoader/UniversalClassLoader.php";

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
  'Symfony' => __DIR__."/lib/vendor/symfony/src",
));

$loader->register();
