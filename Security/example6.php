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
 * Plaintext password is never a good choice. Writing your own encoder is quite
 * easy. According to the base code, you should extend BasePasswordEncoder rather
 * than implementing PasswordEncoderInterface.
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";
require_once __DIR__."/YamlUserProvider.php";
require_once __DIR__."/TrickyPasswordEncoder.php";

use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

// Encoders, only plaintext encoder
$encoders = array(
		'Symfony\Component\Security\Core\User\User' => new TrickyPasswordEncoder()
);

// Providers, only Dao
$providers = array(
		new DaoAuthenticationProvider(
						new YamlUserProvider("tricked_users.yml"),
						new UserChecker(),
						'yaml_users',
						new EncoderFactory($encoders)
		)
);

$apm = new AuthenticationProviderManager($providers);

$token = new UsernamePasswordToken('javi', 'password', 'yaml_users');

try {
	$token = $apm->authenticate($token);
	print_r($token->getRoles());
} catch (\Exception $e) {
	print $e->getMessage();
}
print "\n";

