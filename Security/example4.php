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
 * The AuthenticationProviderManager handles the authentication process (that is,
 * who you are). This authentication information is passed to this object via
 * tokens. Every token fits a different provider, this is why we are using
 * AnonymousAuthenticationProvider.
 * 
 * This is a very stupid example with the only intention to show the easiest
 * implementation of an authentication process. 
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__ . "/../autoload.php";

use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;

// Initialize authentication for anonymous users
$providers = array(
		new AnonymousAuthenticationProvider('anonymous_area')
);

$apm = new AuthenticationProviderManager($providers);

// The token represents the authentication data
$token = new AnonymousToken("anonymous_area", "Anonymous", array("IS_AUTHENTICATED_ANONYMOUSLY"));

try {
	$token = $apm->authenticate($token);
	print_r($token->getRoles());
} catch (\Exception $e) {
	print $e->getMessage();
}
print "\n";

