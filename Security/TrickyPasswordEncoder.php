<?php

use Symfony\Component\Security\Core\Encoder\PlaintextPasswordEncoder;

/**
 * TrickyPasswordEncoder encode substituing vowels for numbers.
 *
 * @author Javier Lopez <f12loalf@gmail.com>
 */
class TrickyPasswordEncoder extends PlaintextPasswordEncoder {

	private $map = array(
			'0' => 'a',
			'1' => 'e',
			'2' => 'i',
			'3' => 'o',
			'4' => 'u'
	);
	
	/**
	 * {@inheritdoc}
	 */
	public function isPasswordValid($encoded, $raw, $salt) {
		$raw = $this->encodePassword($raw, $salt);
		return parent::isPasswordValid($encoded, $raw, $salt);
	}

	/**
	 * {@inheritdoc}
	 */
	public function encodePassword($raw, $salt) {
		$raw = str_replace(array_values($this->map), array_keys($this->map), $raw);
		return parent::encodePassword($raw, $salt);
	}

}

?>
