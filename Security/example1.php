<?php

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

// Encoders, only plaintext encoder
$encoders  = array(
  'Symfony\Component\Security\Core\User\User' => new PlaintextPasswordEncoder()
);

// Users, only one in memory user
$users     = array(
  'javi' => array( 
    'password' => 'my_pass', 
    'roles' => array('ROLE_ADMIN')
  )
);

// Voters, only RoleVoter, that is, we grant the user depending on its role
$voters    = array(new RoleVoter());

// Providers, only 
$providers = array(
  new DaoAuthenticationProvider(
    new InMemoryUserProvider($users),
    new UserChecker(),
    'memory',
    new EncoderFactory($encoders)
  )
);

$context = new SecurityContext(
  new AuthenticationProviderManager($providers),
  new AccessDecisionManager($voters)
);

$token = new UsernamePasswordToken('javi','my_pass','memory');
$context->setToken($token);

try{
  if($context->isGranted('ROLE_ADMIN'))
  {
    echo "User granted \n";
  }
}catch(\Exception $e){
  echo $e->getMessage()."\n";
}
