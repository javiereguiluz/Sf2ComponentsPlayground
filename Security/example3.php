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
 * Sometimes we need multiple providers, that is, different sources for our users.
 * The ChainUserProvider is what we should use then.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";
require_once __DIR__."/YamlUserProvider.php";

use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\User\ChainUserProvider;

// List of in memory users
$users     = array(
  'fabien' => array( 
    'password' => 'his_pass', 
    'roles' => array('ROLE_LEAD')
  ),
);

$providers[] = new InMemoryUserProvider($users);
$providers[] = new YamlUserProvider("users.yml");

$all_users = new ChainUserProvider($providers);

$me = $all_users->loadUserByUsername('fabien');
print $me->getUsername()."\n";
print $me->getPassword()."\n";

$me = $all_users->loadUserByUsername('javi');
print $me->getUsername()."\n";
print $me->getPassword()."\n";