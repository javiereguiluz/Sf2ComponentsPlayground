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
 * In this first example we just focus on users and providers. We are going to
 * create some in memory users that will be usefull in the next examples.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */
require_once __DIR__."/../autoload.php";

use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\User\User as User;

// List of in memory users
$users     = array(
  'javi' => array( 
    'password' => 'my_pass', 
    'roles' => array('ROLE_DEV')
  ),
	'fabien' => array(
	  'password' => 'his_pass',
		'roles'    => array('ROLE_LEAD')
	)
);

$memory_users = new InMemoryUserProvider($users);

// We can create new users in runtime
$user = new User('foo', 'bar', array('ROLE_FOO'));
$memory_users->createUser($user);

$me = $memory_users->loadUserByUsername('fabien'); // User Object
print $me->getUsername()."\n";
print $me->getPassword()."\n";