<?php

require_once __DIR__."/../autoload.php";

use Symfony\Component\DomCrawler\Crawler;

$uri	 = 'http://symfony.com/blog'; 
$content = file_get_contents($uri);

$crawler = new Crawler($content, $uri);

$nodes = $crawler->filterXPath('//div[@class="box_article"]//a'); 
foreach($nodes->links() as $link)
{
  print $link->getUri()."\n";
}
