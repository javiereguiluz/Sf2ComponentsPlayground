<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\CssSelector\CssSelector;

print CssSelector::toXPath('div.box_article a');
print "\n";
