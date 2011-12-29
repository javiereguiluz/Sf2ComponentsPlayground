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
 * In this case, we are closer to a real life example. We have some users in a
 * YAML file, whose password in not encoded (plaintext).
 * 
 * Now, we create a UsernamePasswordToken to authenticate the user. When you create
 * a token, you have to say against which provider you are authenticating.
 * 
 * At the end of this examle there are three attempts to authenticate the user, being
 * valid only the last one.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__ . "/../autoload.php";
require_once __DIR__ . "/YamlUserProvider.php";

use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

// Encoders, only plaintext encoder
$encoders = array(
		'Symfony\Component\Security\Core\User\User' => new PlaintextPasswordEncoder()
);

// Providers, only Dao
$providers = array(
		new DaoAuthenticationProvider(
						new YamlUserProvider("users.yml"),
						new UserChecker(),
						'yaml_users',
						new EncoderFactory($encoders)
		)
);

$apm = new AuthenticationProviderManager($providers);



// Test 1: Bad Credentials
$token = new UsernamePasswordToken('foo', 'bar', 'yaml_users');

try {
	$token = $apm->authenticate($token);
	print_r($token->getRoles());
} catch (\Exception $e) {
	print $e->getMessage();
}
print "\n";

// Test 2: Bad Credentials
$token = new UsernamePasswordToken('javi', 'bar', 'yaml_users');

try {
	$token = $apm->authenticate($token);
	print_r($token->getRoles());
} catch (\Exception $e) {
	print $e->getMessage();
}
print "\n";

// Test 3: Right	 Credentials
$token = new UsernamePasswordToken('javi', 'my_pass', 'yaml_users');

try {
	$token = $apm->authenticate($token);
	print_r($token->getRoles());
} catch (\Exception $e) {
	print $e->getMessage();
}
print "\n";

