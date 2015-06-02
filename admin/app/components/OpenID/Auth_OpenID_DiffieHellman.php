<?php

/**
 * The OpenID library's Diffie-Hellman implementation.
 *
 * PHP versions 4 and 5
 *
 * LICENSE: See the COPYING file included in this distribution.
 *
 * @access private
 * @package OpenID
 * @author JanRain, Inc. <openid@janrain.com>
 * @copyright 2005-2008 Janrain, Inc.
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache
 */


/**
 * The Diffie-Hellman key exchange class.  This class relies on
 * {@link Auth_OpenID_MathLibrary} to perform large number operations.
 *
 * @access private
 * @package OpenID
 */
class Auth_OpenID_DiffieHellman {
	const DEFAULT_MODE = '155172898181473697471232257763715539915724801966915404479707795314057629378541917580651227423698188993727816152646631438561595825688188889951272158842675419950341258706556549803580104870537681476726513255747040765857479291291572334510643245094715007229621094194349783925984760375594985848253359305585439638443';
	const DEFAULT_GEN  = 2;

	var $mod;
	var $gen;
	var $private;
	var $public;
	var $math_lib = null;

	function Auth_OpenID_DiffieHellman($mod = null, $gen = null, $private = null){
		if ($mod === null) {
			$this->mod = Auth_OpenID_MathLibrary::init(self::DEFAULT_MODE);
		} else {
			$this->mod = $mod;
		}

		if ($gen === null) {
			$this->gen = Auth_OpenID_MathLibrary::init(self::DEFAULT_GEN);
		} else {
			$this->gen = $gen;
		}

		if ($private === null) {
			$r = Auth_OpenID_MathLibrary::rand($this->mod);
			$this->private = Auth_OpenID_MathLibrary::add($r, 1);
		} else {
			$this->private = $private;
		}

		$this->public = Auth_OpenID_MathLibrary::powmod($this->gen, $this->private, $this->mod);
	}

	function getSharedSecret($composite)
	{
		return Auth_OpenID_MathLibrary::powmod($composite, $this->private, $this->mod);
	}

	function getPublicKey()
	{
		return $this->public;
	}


	function xorSecret($composite, $secret, $hash_func)
	{
		$dh_shared = $this->getSharedSecret($composite);
		$dh_shared_str = Auth_OpenID_MathLibrary::longToBinary($dh_shared);
		$hash_dh_shared = Auth_OpenID_HMAC::$hash_func($dh_shared_str);

		$xsecret = "";
		for ($i = 0; $i < Auth_OpenID::bytes($secret); $i++) {
			$xsecret .= chr(ord($secret[$i]) ^ ord($hash_dh_shared[$i]));
		}

		return $xsecret;
	}
}


