<?php

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
