<?php
/**
 * Http class file.
 *
 */

/**
 * HTTP通信を行うクラス
 *
 */
class Http
{
	/**
	 * HTTPのリクエスト
	 *
	 * <pre>
	 * レスポンスデータは、ヘッダとボディに分かれ、
	 * 1行ごと配列に格納されて返る。
	 * 改行コードで区切るため、バイナリデータでは使用できません。
	 * </pre>
	 *
	 * @param	$url			URL
	 * @param	$method			メソッド
	 * @param	$headers		ヘッダ (連想配列で、複数指定可能)
	 * @param	$content		コンテント
	 * @param	$ary_header		レスポンスヘッダが、1行ごと配列に格納されて返る
	 * @param	$ary_body		レスポンスボディが、1行ごと配列に格納されて返る
	 * @return	成功時に、0が返る
	 */
	public static function requestArray($url, $method, $headers, $content, &$ary_header, &$ary_body)
	{
		$str_header = '';
		$str_body   = '';

		// HTTP リクエスト
		$ret = self::requestStr($url, $method, $headers, $content, $str_header, $str_body);
		if ($ret != 0)
		{
			// エラー
			return($ret);
		}


		$ary_header = self::strToArray($str_header);
		$ary_body = self::strToArray($str_body);


		return($ret);


		// デバック用
		//
		//echo("<HTML><BODY><PRE>");
		//echo("requestArray\r\n");
		//echo("----------\r\n");
		//echo("ret = ". $ret. "\r\n");
		//echo("----------\r\n");
		//echo("response header:\r\n");
		//print_r($ary_header);
		//echo("----------\r\n");
		//echo("response body:\r\n");
		//print_r($ary_body);
		//echo("----------\r\n");
		//echo("</PRE></BODY></HTML>");
	}

	/**
	 * HTTPのリクエスト
	 *
	 * <pre>
	 * レスポンスデータは、ヘッダとボディに分かれ、文字列で返る
	 * </pre>
	 *
	 * @param	$url			URL
	 * @param	$method			メソッド
	 * @param	$headers		ヘッダ (連想配列で、複数指定可能)
	 * @param	$content		コンテント
	 * @param	$str_header		レスポンスヘッダが文字列で返る
	 * @param	$str_body		レスポンスボディが文字列で返る
	 * @return	成功時に、0が返る
	 */
	public static function requestStr($url, $method, $headers, $content, &$str_header, &$str_body)
	{
		$response = '';

		// HTTP リクエスト
		$ret = self::request($url, $method, $headers, $content, $response);
		if ($ret != 0)
		{
			// エラー
			return($ret);
		}

		// ヘッダと ボディに別ける
		$tmp = explode("\r\n\r\n", $response, 2);


		$str_header = $tmp[0];

		$str_body   = '';
		if (count($tmp) > 1)
		{
			$str_body = $tmp[1];
		}


		return($ret);


		// デバック用
		//
		//echo("<HTML><BODY><PRE>");
		//echo("requestStr\r\n");
		//echo("----------\r\n");
		//echo("ret = ". $ret. "\r\n");
		//echo("----------\r\n");
		//echo("response header:\r\n");
		//echo($str_header. "\r\n");
		//echo("----------\r\n");
		//echo("response body:\r\n");
		//echo($str_body. "\r\n");
		//echo("----------\r\n");
		//echo("</PRE></BODY></HTML>");
	}

	/**
	 * HTTPのリクエスト
	 *
	 * <pre>
	 * $responseには、ヘッダ＋ボディのデータが格納される
	 * </pre>
	 *
	 * @param	$url		URL
	 * @param	$method		メソッド
	 * @param	$headers	ヘッダ (連想配列で、複数指定可能)
	 * @param	$content	コンテント
	 * @param	$response	レスポンスデータが返る
	 * @return	成功時に、0が返る
	 */
	public static function request($url, $method, $headers, $content, &$response)
	{
		$ret      = 0;		// 結果
		$response = '';		// レスポンス


		// ヘッダを解析する
		$header = '';
		foreach ($headers as $key => $val)
		{
			$header .= $key. ':'. $val. "\r\n";
		}


		//------------------------------
		// メソッドごとにパラメータを設定する
		//------------------------------
		$param = array();
		if ($method == 'GET')
		{
			$param =
			array('http' =>
				array(
					'method'	=> $method,
					'header'	=> $header
				)
			);
		}
		else if ($method == 'POST' || $method == 'PUT')
		{
			$param =
			array('http' =>
				array(
					'method'	=> $method,
					'header'	=> $header,
					'content'	=> $content
				)
			);
		}
		else
		{
			// 不正なメソッド
			return(-10);
		}



		$allow_url_fopen = FALSE;

		//------------------------------
		// allow_url_fopen パラメータについて
		// (ネットの記事より)
		// これがもしOFFになっていると、
		// どうやらfile_get_contents()などは動作してくれないようです。
		// マニュアルを見る限り、このallow_url_fopenってのは
		// PHP_INI_SYSTEMってやつらしいので、早い話がini_set()とかで
		// 変更することができません。
		// php.iniとかを書き換えてapacheを再起動するしかないみたいですね。
		//------------------------------
		if (ini_get('allow_url_fopen') == 1)
		{
			$allow_url_fopen = TRUE;
		}


		if ($allow_url_fopen == TRUE)
		{
			$sc = stream_context_create($param);
			$tmp = file_get_contents($url, FALSE, $sc);

			// ヘッダをつける
			foreach($http_response_header as $response_header)
			{
				$response .= $response_header. "\r\n";
			}
			$response .= "\r\n";
			$response .= $tmp;
		}
		else
		{
			$a_url = parse_url($url);

			$host   = isset($a_url['host'])   ? $a_url['host']   : '';
			$port   = isset($a_url['port'])   ? $a_url['port']   : '';
			$path   = isset($a_url['path'])   ? $a_url['path']   : '';
			$scheme = isset($a_url['scheme']) ? $a_url['scheme'] : '';

			// portを取得する
			if (empty($port))
			{
				$port = 80;
				if ($scheme == 'https')
				{
					$port = 443;
				}
			}


			$fp = fsockopen($host, $port, $errno, $errstr, 30);

			if ($fp === FALSE)
			{
				$response .= "$errstr ($errno)\r\n";
				$ret = -20;
			}
			else
			{
				$method  = $param['http']['method'];
				$header  = isset($param['http']['header'])  ? $param['http']['header']  : '';
				$content = isset($param['http']['content']) ? $param['http']['content'] : '';

				$out  = sprintf("%s %s HTTP/1.1\r\n", $method, $path);
				$out .= sprintf("Host: %s\r\n", $host);
				$out .= $header;
				$out .= "Connection: Close\r\n";
				$out .= "\r\n";
				$out .= $content;

				fwrite($fp, $out);
				while (! feof($fp))
				{
					$response .= fgets($fp, 128);
				}
				fclose($fp);
			}
		}

		return($ret);


		// デバック用
		//
		//echo("<HTML><BODY><PRE>");
		//echo("request\r\n");
		//echo("----------\r\n");
		//echo("ret = ". $ret. "\r\n");
		//echo("----------\r\n");
		//echo("response:\r\n");
		//echo($response);
		//echo("</PRE></BODY></HTML>");
	}

	/**
	 * Parse respond header to array
	 *
	 * @param string $str_header
	 * @param boolean $associate whether return associate array
	 * @param char $delimit the char delimits between key and value in case of association array
	 * @return array
	 */
	public static function strToArray($str_inputs, $associate = false, $param = false){
		// 改行コードを \n に統一し、1行ごとに分割する
		if($param){
			$line_delimit = '&';
			$delimit = '=';
		}else{
			$line_delimit="\n";
			$delimit=':';
			$str_inputs = str_replace(array("\r\n","\r"), $line_delimit, $str_inputs);
		}

		$arr_outputs = explode($line_delimit, $str_inputs);

		if(!$associate){
			return $arr_outputs;
		}

		$len = count($arr_outputs);
		$ass_arr_outputs = array();
		for($i = 0; $i < $len; $i++){
			$arr_item = explode($delimit, $arr_outputs[$i], 2);
			if(trim($arr_item[0]) != '')
				$ass_arr_outputs[trim($arr_item[0])] = isset($arr_item[1]) ? trim($arr_item[1]) : '';
		}
		return $ass_arr_outputs;
	}

	/**
	 * Implements the PHP 5 'http_build_query' functionality.
	 *
	 * @access private
	 * @param array $data Either an array key/value pairs or an array
	 * of arrays, each of which holding two values: a key and a value,
	 * sequentially.
	 * @return string $result The result of url-encoding the key/value
	 * pairs from $data into a URL query string
	 * (e.g. "username=bob&id=56").
	 */
	public static function buildQuery($data)
	{
		$pairs = array();
		foreach ($data as $key => $value) {
			if (is_array($value)) {
				$pairs[] = urlencode($value[0])."=".urlencode($value[1]);
			} else {
				$pairs[] = urlencode($key)."=".urlencode($value);
			}
		}
		return implode("&", $pairs);
	}

	/**
	 * Replacement for PHP's broken parse_str.
	 */
	static function parseStr($query)
	{
		if ($query === null) {
			return null;
		}

		$parts = explode('&', $query);

		$new_parts = array();
		for ($i = 0; $i < count($parts); $i++) {
			$pair = explode('=', $parts[$i]);

			if (count($pair) != 2) {
				continue;
			}

			list($key, $value) = $pair;
			$new_parts[urldecode($key)] = urldecode($value);
		}

		return $new_parts;
	}
}
?>
