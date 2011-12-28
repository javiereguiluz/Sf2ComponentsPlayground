<?php

/*
 * Components Playground: DomCrawler (Example 2)
 * 
 * Description:
 * Another example, this time we are getting all the blog posts from the symfony.com
 * website.
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

$nodes = $crawler->filterXPath('//div[@class="box_article"]//a'); 
foreach($nodes->links() as $link)
{
  print $link->getUri()."\n";
}
