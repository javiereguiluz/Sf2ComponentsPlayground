<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\Filesystem\Filesystem;

$fs = new Filesystem();
$fs->touch('test.php');

// You should see a new file in this directory named test.php
