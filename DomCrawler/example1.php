<?php

/*
 * Components Playground: DomCrawler (Example 1)
 * 
 * Description:
 * The DomCrawler component allows us to crawl a piece of structured content (DOM
 * , XML, HTML) to extract information.
 * 
 * In this example we are getting all the twits containing the workd "symfony2"
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__.'/../autoload.php';

use Symfony\Component\DomCrawler\Crawler;

$uri	 = 'http://search.twitter.com/search.atom?q=symfony2'; 
$crawler = new Crawler(); 
$content = file_get_contents($uri); 
$crawler->addXmlContent($content);

foreach($crawler->filterXpath('//content') as $node) {
  print $node->nodeValue."\n";
  print "-- \n";
}
