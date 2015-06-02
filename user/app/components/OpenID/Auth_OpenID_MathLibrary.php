<?php

/**
 * BigMath: A math library wrapper that abstracts out the underlying
 * long integer library.
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
 * Needed for random number generation
 */
//require_once 'Auth_OpenID_CryptUtil.php';

/**
 * Need Auth_OpenID::bytes().
 */
//require_once 'Auth_OpenID.php';

/**
 * The superclass of all big-integer math implementations
 * @access private
 * @package OpenID
 */
class Auth_OpenID_MathLibrary {
	/**
	 * Given a long integer, returns the number converted to a binary
	 * string.  This function accepts long integer values of arbitrary
	 * magnitude and uses the local large-number math library when
	 * available.
	 *
	 * @param integer $long The long number (can be a normal PHP
	 * integer or a number created by one of the available long number
	 * libraries)
	 * @return string $binary The binary version of $long
	 */
	static function longToBinary($long)
	{
		$cmp = self::cmp($long, 0);
		if ($cmp < 0) {
			$msg = __FUNCTION__ . " takes only positive integers.";
			addlog($msg, CLogger::LEVEL_ERROR);
			return null;
		}

		if ($cmp == 0) {
			return "\x00";
		}

		$bytes = array();

		while (self::cmp($long, 0) > 0) {
			array_unshift($bytes, self::mod($long, 256));
			$long = self::div($long, pow(2, 8));
		}

		if ($bytes && ($bytes[0] > 127)) {
			array_unshift($bytes, 0);
		}

		$string = '';
		foreach ($bytes as $byte) {
			$string .= pack('C', $byte);
		}

		return $string;
	}

	/**
	 * Given a binary string, returns the binary string converted to a
	 * long number.
	 *
	 * @param string $binary The binary version of a long number,
	 * probably as a result of calling longToBinary
	 * @return integer $long The long number equivalent of the binary
	 * string $str
	 */
	static function binaryToLong($str)
	{
		if ($str === null) {
			return null;
		}

		// Use array_merge to return a zero-indexed array instead of a
		// one-indexed array.
		$bytes = array_merge(unpack('C*', $str));

		$n = self::init(0);

		if ($bytes && ($bytes[0] > 127)) {
			addlog("bytesToNum works only for positive integers.", CLogger::LEVEL_ERROR);
			return null;
		}

		foreach ($bytes as $byte) {
			$n = self::mul($n, pow(2, 8));
			$n = self::add($n, $byte);
		}

		return $n;
	}

	static function base64ToLong($str)
	{
		$b64 = base64_decode($str);

		if ($b64 === false) {
			return false;
		}

		return self::binaryToLong($b64);
	}

	static function longToBase64($str)
	{
		return base64_encode(self::longToBinary($str));
	}

	/**
	 * Returns a random number in the specified range.  This function
	 * accepts $start, $stop, and $step values of arbitrary magnitude
	 * and will utilize the local large-number math library when
	 * available.
	 *
	 * @param integer $start The start of the range, or the minimum
	 * random number to return
	 * @param integer $stop The end of the range, or the maximum
	 * random number to return
	 * @param integer $step The step size, such that $result - ($step
	 * * N) = $start for some N
	 * @return integer $result The resulting randomly-generated number
	 */
	static function rand($stop)
	{
		static $duplicate_cache = array();

		// Used as the key for the duplicate cache
		$rbytes = self::longToBinary($stop);

		if (array_key_exists($rbytes, $duplicate_cache)) {
			list($duplicate, $nbytes) = $duplicate_cache[$rbytes];
		} else {
			if ($rbytes[0] == "\x00") {
				$nbytes = Auth_OpenID::bytes($rbytes) - 1;
			} else {
				$nbytes = Auth_OpenID::bytes($rbytes);
			}

			$mxrand = self::pow(256, $nbytes);

			// If we get a number less than this, then it is in the
			// duplicated range.
			$duplicate = self::mod($mxrand, $stop);

			if (count($duplicate_cache) > 10) {
				$duplicate_cache = array();
			}

			$duplicate_cache[$rbytes] = array($duplicate, $nbytes);
		}

		do {
			$bytes = "\x00" . Auth_OpenID_CryptUtil::getBytes($nbytes);
			$n = self::binaryToLong($bytes);
			// Keep looping if this value is in the low duplicated range
		} while (self::cmp($n, $duplicate) < 0);

		return self::mod($n, $stop);
	}



	////////////////////////////////////////////////////////////////////////////
	// Use BCMath extension or GMP extension
	//
	/*
	static function add($x, $y)
	{
		return bcadd($x, $y);
	}

	static function sub($x, $y)
	{
		return bcsub($x, $y);
	}

	static function pow($base, $exponent)
	{
		return bcpow($base, $exponent);
	}

	static function cmp($x, $y)
	{
		return bccomp($x, $y);
	}

	static function init($number, $base = 10)
	{
		return $number;
	}

	static function mod($base, $modulus)
	{
		return bcmod($base, $modulus);
	}

	static function mul($x, $y)
	{
		return bcmul($x, $y);
	}

	static function div($x, $y)
	{
		return bcdiv($x, $y);
	}

	static function _powmod($base, $exponent, $modulus)
	{
		$square = self::mod($base, $modulus);
		$result = 1;
		while(self::cmp($exponent, 0) > 0) {
			if (self::mod($exponent, 2)) {
				$result = self::mod(self::mul($result, $square), $modulus);
			}
			$square = self::mod(self::mul($square, $square), $modulus);
			$exponent = self::div($exponent, 2);
		}
		return $result;
	}

	static function powmod($base, $exponent, $modulus)
	{
		if (function_exists('bcpowmod')) {
			return bcpowmod($base, $exponent, $modulus);
		} else {
			return self::_powmod($base, $exponent, $modulus);
		}
	}

	static function toString($num)
	{
		return $num;
	}

	/*/
	static function add($x, $y)
	{
		return gmp_add($x, $y);
	}

	static function sub($x, $y)
	{
		return gmp_sub($x, $y);
	}

	static function pow($base, $exponent)
	{
		return gmp_pow($base, $exponent);
	}

	static function cmp($x, $y)
	{
		return gmp_cmp($x, $y);
	}

	static function init($number, $base = 10)
	{
		return gmp_init($number, $base);
	}

	static function mod($base, $modulus)
	{
		return gmp_mod($base, $modulus);
	}

	static function mul($x, $y)
	{
		return gmp_mul($x, $y);
	}

	static function div($x, $y)
	{
		return gmp_div_q($x, $y);
	}

	static function powmod($base, $exponent, $modulus)
	{
		return gmp_powm($base, $exponent, $modulus);
	}

	static function toString($num)
	{
		return gmp_strval($num);
	}/**/
}
