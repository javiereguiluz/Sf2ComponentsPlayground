<?php

/*
 * Components Playground: CssSelector (Example 1)
 * 
 * Description:
 * The only mission of this component is to generate XPath expression from CSS
 * selector so, let's see this in action.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\CssSelector\CssSelector;

print CssSelector::toXPath('div.box_article a');
print "\n";
