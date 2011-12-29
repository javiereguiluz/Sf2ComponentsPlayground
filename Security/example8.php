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
 * The best way to work with the Security Component is to use the SecurityContext.
 * 
 * 
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager;
use Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider;
use Symfony\Component\Security\Core\User\UserChecker;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManager;
use Symfony\Component\Security\Core\Authorization\Voter\RoleVoter;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;
use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

// AuthenticationProviderManager setup
$encoders = array(
		'Symfony\Component\Security\Core\User\User' => new PlaintextPasswordEncoder()
);

$providers = array(
		new DaoAuthenticationProvider(
						new YamlUserProvider("users.yml"),
						new UserChecker(),
						'yaml_users',
						new EncoderFactory($encoders)
		)
);

$apm = new AuthenticationProviderManager($providers);

// AccessDecisionManager setup
$voters    = array(new RoleVoter());
$adm = new AccessDecisionManager($voters);

// SecurityContext setup
$context = new SecurityContext($apm, $adm);

// Test a token against our security system
$token = new UsernamePasswordToken('javi','my_pass','yaml_users');
$context->setToken($token);

try{
  if($context->isGranted('ROLE_DEV'))
  {
    echo "User granted \n";
  }
}catch(\Exception $e){
  echo $e->getMessage()."\n";
}
