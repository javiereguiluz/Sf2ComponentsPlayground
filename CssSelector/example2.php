<?php

/*
 * Components Playground: CssSelector (Example 2)
 * 
 * Description:
 * You can use DomCrawler in conjuction with this component to crawl documents 
 * using css selector instead of xPath expressions.
 * 
 * Notice that some special nodes, anchors and forms, can be converted to special
 * objects, Link and Form, instead of just DOM nodes. 
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\DomCrawler\Crawler;

$uri	 = 'http://symfony.com/blog'; 
$content = file_get_contents($uri);

$crawler = new Crawler($content, $uri); 
$nodes = $crawler->filter('div.box_article a');

foreach($nodes->links() as $link) {
  print $link->getUri()."\n";
}
