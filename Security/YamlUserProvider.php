<?php

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Yaml\Yaml;

/**
 * YamlUserProvider is a simple way to load users from a YAML file.
 *
 * @author Javier Lopez <f12loalf@gmail.com>
 */
class YamlUserProvider implements UserProviderInterface {

	private $filename;
	private $users;

	/**
	 * Constructor.
	 *
	 * The Yaml file should be formatted like this
	 * users:
	 *   foo:
	 *     password: 'my_pass'
	 *     roles:    [ROLE_BAR, ROLE_FOO]
	 *     enabled:  true
	 *
	 * @param string $filename The name of the YAML file
	 */
	public function __construct($filename) {
		if (!file_exists($filename)) {
			throw new \LogicException("Yaml file doesn't exist");
		}

		$this->filename = $filename;
	}

	/**
	 * {@inheritDoc}
	 */
	public function loadUserByUsername($username) {
		if (empty($this->users)) {
			$this->loadUsersFromYaml();
		}
		
		if(isset($this->users[$username]))
		{
			return $this->users[$username];
		}
		
		throw new UsernameNotFoundException(sprintf('Username "%s" does not exist.', $username));
	}

	/**
	 * {@inheritDoc}
	 */
	public function refreshUser(UserInterface $user) {
		if (!$user instanceof User) {
			throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
		}

		return $this->loadUserByUsername($user->getUsername());
	}

	/**
	 * {@inheritDoc}
	 */
	public function supportsClass($class) {
		return $class === 'Symfony\Component\Security\Core\User\User';
	}
	
	public function loadUsersFromYaml()
	{
		$data = Yaml::parse($this->filename);
		foreach($data['users'] as $user => $info)
		{
			$this->users[$user] = new User($user, $info['password'], $info['roles'], $info['enabled']);
		}
	}

}

?>
