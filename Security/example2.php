<?php

/*
 * Components Playground: Security (Example 1)
 * 
 * Description:
 * Before start looking at this code I think it should be a good idea to read 
 * this introduction to the Security Component so you familiarize with the key
 * concepts: authentication, authorization, providers, users, encoders and roles.
 * http://symfony.com/doc/current/book/security.html
 * 
 * Here we are building our vey own UserProvider, this time users are loaded from
 * a YAML file. Take a look at the class to see how it works.
 * 
 * To create your own UserProvider you only need to create a class that extends
 * UserProviderInterface.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";
require_once __DIR__."/YamlUserProvider.php";

$yaml_users = new YamlUserProvider("users.yml");

$me = $yaml_users->loadUserByUsername('javi');
print $me->getUsername()."\n";
print $me->getPassword()."\n";