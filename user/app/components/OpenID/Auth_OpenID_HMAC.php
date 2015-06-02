<?php

/**
 * This is the HMACSHA1 implementation for the OpenID library.
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


class Auth_OpenID_HMAC {
	//----------------------------------------
	// 静的 属性
	//----------------------------------------
	static $map_func = array('DH-SHA1' => 'SHA1', 'DH-SHA256' => 'SHA256', 'HMAC-SHA1' => 'HMACSHA1', 'HMAC-SHA256' => 'HMACSHA256');


	//----------------------------------------
	// 静的 関数
	//----------------------------------------
	static function SHA1($text)
	{
		return hash('sha1', $text, true);
	}

	/**
	 * Compute an HMAC/SHA1 hash.
	 *
	 * @access private
	 * @param string $key The HMAC key
	 * @param string $text The message text to hash
	 * @return string $mac The MAC
	 */
	static function HMACSHA1($key, $text)
	{
		return hash_hmac('sha1', $text, $key, true);
	}


	static function SHA256($text)
	{
		// PHP 5 case: 'hash' available and 'sha256' algo supported.
		return hash('sha256', $text, true);
	}

	static function HMACSHA256($key, $text)
	{
		// Return raw MAC (not hex string).
		return hash_hmac('sha256', $text, $key, true);
	}

	// Get function appropriate to hash-type
	static function getHashFunction($name){
		if(isset(self::$map_func[$name])){
			return self::$map_func[$name];
		}

		addlog('Not find out hash function of ' . $name, CLogger::LEVEL_ERROR);
		return false;
	}
}
