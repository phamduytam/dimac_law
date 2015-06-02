<?php

/**
 * This is the PHP OpenID library by JanRain, Inc.
 *
* This module contains core utility functionality used by the
* library.
* Mulodo's Hieu remains some functions for using
*
* PHP versions 4 and 5
*
* LICENSE: See the COPYING file included in this distribution.
*
* @package OpenID
* @author JanRain, Inc. <openid@janrain.com>
* @copyright 2005-2008 Janrain, Inc.
* @license http://www.apache.org/licenses/LICENSE-2.0 Apache
*/


/**
 * The OpenID utility function class.
 *
 * @package OpenID
 * @access private
 */
class Auth_OpenID {
	//----------------------------------------
	// 定数
	//----------------------------------------
	const RANDOM_RANGE = 10;
	const OPENID2_NS = 'http://specs.openid.net/auth/2.0';
	const NONCE_CHRS = 'abcdefghijklmnopqrstuvwxyz';
	const NONCE_TIME_FMT = '%Y-%m-%dT%H:%M:%SZ';
	const NONCE_REGEX = '/(\d{4})-(\d\d)-(\d\d)T(\d\d):(\d\d):(\d\d)Z(.*)/';

	//----------------------------------------
	// 静的 属性
	//----------------------------------------


	//----------------------------------------
	// 静的 関数
	//----------------------------------------
	/**
	 * Count the number of bytes in a string independently of
	 * multibyte support conditions.
	 *
	 * @param string $str The string of bytes to count.
	 * @return int The number of bytes in $str.
	 */
	static function bytes($str)
	{
		return strlen(bin2hex($str)) / 2;
	}

	/**
	 * Adds a string prefix to all keys of an array.  Returns a new
	 * array containing the prefixed keys.
	 */
	static function addPrefixKeys($arr_inputs, $prefix = 'openid.')
	{
		$arr_outputs = array();
		foreach ($arr_inputs as $k => $v) {
			$arr_outputs[$prefix . $k] = $v;
		}
		return $arr_outputs;
	}

	/**
	 * Detach a string prefix to all keys of an array.  Returns a new
	 * array containing without prefix
	 */
	static function detachPrefixKeys($arr_inputs, $prefix = 'openid.')
	{
		$arr_outputs = array();
		$len = strlen($prefix);
		foreach ($arr_inputs as $k => $v) {
			$key = ($prefix === substr($k, 0, $len)) ? substr($k, $len) : $k;
			$arr_outputs[$key] = $v;
		}
		return $arr_outputs;
	}

	/**
	 * Returns available session types.
	 */
	static function getAvailableSessionTypes()
	{
		$types = array(
			'no-encryption' => 'Auth_OpenID_PlainTextConsumerSession',
			'DH-SHA1' => 'Auth_OpenID_DiffieHellmanSHA1ConsumerSession',
			'DH-SHA256' => 'Auth_OpenID_DiffieHellmanSHA256ConsumerSession'
		);

		return $types;
	}

	/**
	 * Make number once
	 */
	static function mkNonce($when = null)
	{
		// Generate a nonce with the current timestamp
		$salt = Auth_OpenID_CryptUtil::randomString(
			self::RANDOM_RANGE, self::NONCE_CHRS);
		if ($when === null) {
			// Current time
			$when = time();
		}
		$time_str = gmstrftime(self::NONCE_TIME_FMT, $when);
		return $time_str . $salt;
	}

	/**
	 * Parse nonce string
	 */
	static function splitNonce($nonce_string){
		// Extract a timestamp from the given nonce string
		$result = preg_match(self::NONCE_REGEX, $nonce_string, $matches);
		if ($result != 1 || count($matches) != 8) {
			return false;
		}

		list($unused, $tm_year, $tm_mon, $tm_mday, $tm_hour, $tm_min, $tm_sec, $uniquifier) = $matches;

		$timestamp = @gmmktime($tm_hour, $tm_min, $tm_sec, $tm_mon, $tm_mday, $tm_year);

		if ($timestamp === false || $timestamp < 0) {
			return false;
		}

		return array($timestamp, $uniquifier);
	}

	/**
	 * Convert an array into an OpenID colon/newline separated string
	 *
	 */
	static function keyFormFromArray($values)
	{
		if ($values === null) {
			return null;
		}

		//ksort($values);

		$serialized = '';
		foreach ($values as $key => $value) {
			if (is_array($value)) {
				list($key, $value) = array($value[0], $value[1]);
			}

			if (strpos($key, ':') !== false) {
				return null;
			}

			if (strpos($key, "\n") !== false) {
				return null;
			}

			if (strpos($value, "\n") !== false) {
				return null;
			}
			$serialized .= "$key:$value\n";
		}
		return $serialized;
	}

	/**
	 * Enter description here ...
	 * @param String $url
	 */
	static function detachUrl($url)
	{
		@$parsed = parse_url($url);

		if (!$parsed) {
			return null;
		}

		if (!isset($parsed['scheme']) || !isset($parsed['host'])) {
			return null;
		}

		$scheme = strtolower($parsed['scheme']);
		if (!in_array($scheme, array('http', 'https'))) {
			return null;
		}
		$url = $parsed['scheme'] . '://' . $parsed['host'];

		if(isset($parsed['port'])) $url .= ':' . $parsed['port'];

		$parsed['url'] = $url;

		return $parsed;
	}
}