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
 * So far we've been only using one side of the coin and we forgot about
 * authorization (can this user do this?).
 * 
 * The AccessDecisionManager has a group of voters. Each voter decide (according
 * to the ROLE or any other attribute) if the Token is valid.
 * 
 * Once every voter has voted, the AccessDecisionManager takes the final decision
 * according to three different strategies: Affirmative (default), Consensus or
 * Unanimous
 * 
 * Inspired by http://fabien.potencier.org/article/49/what-is-symfony2
 * 
 * @author: Javier Lopez <f12loalf@gmail.com>
 */

require_once __DIR__."/../autoload.php";

use Symfony\Component\Security\Core\Authorization\AccessDecisionManager;
use Symfony\Component\Security\Core\Authorization\Voter\RoleVoter;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

// AccessDecisionManager setup
$voters    = array(new RoleVoter());
$adm = new AccessDecisionManager($voters);

$token = new UsernamePasswordToken('javi','my_pass','memory', array('ROLE_ADMIN'));
if($adm->decide($token, array('ROLE_ADMIN')))
{
	echo "Voters decided token is a ROLE_ADMIN";
}else{
  echo "Voters decided token is NOT a ROLE_ADMIN";
};
echo "\n";
