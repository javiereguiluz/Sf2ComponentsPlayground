<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Filesystem\Filesystem;

$fs = new Filesystem();
$fs->symlink('example3.php', '3.php');

// The file created in the previous example should be deleted.
