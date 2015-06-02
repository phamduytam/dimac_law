<?php
/**
 * Hls class file.
 *
 */

/**
 * HLSの m3u8、keyを出力するクラス
 *
 */
class Hls extends BaseComponent
{
	/** データの初期化エラー */
	const ERROR_INIT_DATA			= '2001';
	/** HTTP通信エラー */
	const ERROR_HTTP				= '3001';

	/** Default new line */
	const NEW_LINE = "\r\n";

	/** データの初期化済みフラグ */
	private $_init_data = false;
	/** URLのベース */
	private $_url_base;
	/** 月額パックID */
	private $_mpack_id;
	/** コンテンツID */
	private $_content_id;
	/** 共通ID */
	private $_share_id;
	/** キー */
	private $_cipher_key;
	/** URL */
	private $_url;



	/**
	 * コンストラクタ
	 *
	 * @param string $mpack_id 月額パックID
	 * @param string $content_id コンテンツID
	 */
	function __construct($mpack_id, $content_id)
	{
		//parent::__construct();

		$this->_url_base = self::get_url_base($mpack_id, $content_id);

		$this->_mpack_id = $mpack_id;
		$this->_content_id = $content_id;
	}



	/**
	 * ファイル名の取得
	 *
	 * 月額パックの場合: 月額パックID + '-' + コンテンツID
	 * コンテンツの場合: コンテンツID
	 *
	 * @return strint ファイル名
	 */
	private function get_filename()
	{
		$ret = '';

		if (strlen($this->_mpack_id) > 0)
		{
			$ret .= $this->_mpack_id. '-';
		}

		$ret .= $this->_content_id;

		return $ret;
	}



	/**
	 * 個別課金コンテンツのm3u8のURLの取得
	 *
	 * @param string $content_id コンテンツID
	 * @return string コンテンツのm3u8のURL
	 */
	public static function getUrlM3u8Content($content_id)
	{
		$hls = new Hls('', $content_id);
		return $hls->getUrlM3u8();
	}

	/**
	 * 月額パックコンテンツのm3u8のURLの取得
	 *
	 * @param string $mpack_id 月額パックID
	 * @param string $content_id コンテンツID
	 * @return string 月額パックコンテンツのm3u8のURL
	 */
	public static function getUrlM3u8MpackContent($mpack_id , $content_id)
	{
		$hls = new Hls($mpack_id, $content_id);
		return $hls->getUrlM3u8();
	}

	/**
	 * m3u8を取得するためのURLの取得
	 */
	public function getUrlM3u8()
	{
		return $this->get_url_m3u8_base(). '/vari';
	}

	/**
	 * URLのベースの取得
	 *
	 * @param string $mpack_id 月額パックID
	 * @param string $content_id コンテンツID
	 */
	private static function get_url_base($mpack_id, $content_id)
	{
		$route = '/api/moviefile/hls';

		if (strlen($mpack_id) > 0)
		{
			$route .= '/mpack/'. $mpack_id. '/'. $content_id;
		}
		else
		{
			$route .= '/content/all/'. $content_id;
		}

		return sslUrl($route);
	}

	/**
	 * m3u8取得用URLのベースの取得
	 */
	private function get_url_m3u8_base()
	{
		return $this->_url_base. '/m3u8';
	}

	/**
	 * キー取得用URLの取得
	 */
	public function get_url_key()
	{
		return $this->_url_base. '/key/vari';
	}



	/**
	 * データの初期化
	 * digital_m_keyテーブルから、キーやURLを取得する。
	 *
	 * @return	boolean 成功時に、trueが返る。
	 */
	private function init_data()
	{
		if ($this->_init_data)
		{
			return(true);
		}

		if (! isset($this->_content_id))
		{
			$this->error(self::ERROR_INIT_DATA);
			return(false);
		}

		$m_key = DigitalOadMKeyAR::findDetail($this->_content_id);
		if (is_null($m_key))
		{
			$this->error(self::ERROR_INIT_DATA);
			return(false);
		}

		$this->_share_id	= $m_key->share_id;
		$this->_cipher_key	= $m_key->cipher_key;
		$this->_url			= $m_key->url;

		$this->_init_data = true;
		return(true);
	}



	/**
	 * m3u8ファイルの取得
	 *
	 * @param	string $path		パス
	 * @param	string &$m3u8		取得したm3u8が格納される
	 * @return	boolean 成功時に、trueが返る。
	 */
	public function getM3u8($path, &$m3u8)
	{
		if ($this->init_data() == false) return(false);


		if ($path == 'vari')
		{
			// m3u8 親ファイルの 取得先URL
			$url = $this->_url;
		}
		else
		{
			// m3u8 子ファイルの 取得先URL
			$url = dirname($this->_url). '/'. base64_decode(urldecode($path));
		}


		$method     = 'GET';
		$headers    = array();
		$content    = '';
		$ary_header = array();
		$ary_body   = array();

		// 元の雛形になるファイルを取得する
		$tmp = Http::requestArray($url, $method, $headers, $content, $ary_header, $ary_body);
		if ($tmp != 0)
		{
			$this->error(self::ERROR_HTTP);
			return(false);
		}


		if ($path == 'vari')
		{
			// m3u8 親ファイル
			$url_m3u8_base = $this->get_url_m3u8_base();
			self::parse_m3u8_parent($url_m3u8_base, $ary_body);
		}
		else
		{
			// m3u8 子ファイル
			$url_m3u8_base = dirname($url);
			$url_key = $this->get_url_key();
			self::parse_m3u8_child($url_m3u8_base, $url_key, $ary_body);
		}


		// \r\nを付けて、複数行にする
		$m3u8 = implode(self::NEW_LINE, $ary_body);

		return(true);
	}

	/**
	 * keyファイルの取得
	 *
	 * @param	binary &$m3u8	取得したkeyが格納される
	 * @return	boolean 成功時に、trueが返る。
	 */
	public function getKey(&$key)
	{
		if ($this->init_data() == false) return(false);


		$key = base64_decode($this->_cipher_key);

		return(true);
	}



	/**
	 * m3u8ファイルのレンダリング
	 *
	 * @param	string $path		パス
	 */
	public function renderM3u8($path)
	{
		$ret = $this->getM3u8($path, $m3u8);

		if ($ret)
		{
			$filename = $this->get_filename();

			if ($path != 'vari')
			{
				$filename .= '-'. dirname(base64_decode(urldecode($path)));
			}
			$filename .= '.m3u8';


			// キャッシュさせない (PHP Manualより)
			header('Cache-Control: no-cache, must-revalidate');
			header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

			//header('Content-Type: application/x-mpegurl');
			header('Content-Type: application/vnd.apple.mpegurl');

			header('Content-Disposition: attachment; filename="'. $filename. '"');
			echo($m3u8);
		}
		else
		{
			$this->renderError();
		}
	}

	/**
	 * keyファイルのレンダリング
	 *
	 */
	public function renderKey()
	{
		$ret = $this->getKey($key);

		if ($ret)
		{
			$filename = $this->get_filename(). '.key';

			// キャッシュさせない (PHP Manualより)
			header('Cache-Control: no-cache, must-revalidate');
			header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

			header('Content-Type: application/octet-stream');

			header('Content-Disposition: attachment; filename="'. $filename. '"');
			echo($key);
		}
		else
		{
			$this->renderError();
		}
	}

	/**
	 * エラーが発生した際のレンダリング
	 *
	 */
	public function renderError()
	{
		$json = array('status'=>500, 'errorCode'=>$this->getErrorCode());

		header('HTTP', true, 500);
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($json);
	}



	//--------------------------------------------------------------------------
	// m3u8ファイル 解析 関連
	//--------------------------------------------------------------------------
	/**
	 * m3u8 親ファイルの解析
	 *
	 * <pre>
	 * m3u8の親ファイルを解析します。
	 *
	 * #EXT-X-STREAM-INF:の1行下に、引数のm3u8のパスを付加します。
	 *
	 * <s>#EXT-X-STREAM-INF:の BANDWIDTHを見つけて、
	 * その1行下に記述されている、m3u8 子ファイルのパスを書換えます。</s>
	 * </pre>
	 *
	 * @param	string $url_m3u8_base	m3u8のパス
	 * @param	string &$m3u8			m3u8 親ファイルを 1行ごとに 配列に格納したもの
	 */
	private static function parse_m3u8_parent($url_m3u8_base, &$m3u8)
	{
		// デバッグ用
		//$content_id = "C00S00P00001";
		//$m3u8 = array();
		//$m3u8[] = "#EXTM3U";
		//$m3u8[] = "#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=240000";
		//$m3u8[] = "*****";
		//$m3u8[] = " #EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=241001";
		//$m3u8[] = "*****";
		//$m3u8[] = "#ext-x-stream-inf:PROGRAM-ID=1,bandwidth=242002";
		//$m3u8[] = "*****";
		//$m3u8[] = "#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=243003,HOGE=0000";
		//$m3u8[] = "*****";
		//$m3u8[] = "#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=244004,HOGE=0000,HOGE2=0000";
		//$m3u8[] = "*****";
		//$m3u8[] = "#EXT-X-STREAM-INF:PROGRAM-ID=1,BANDWIDTH=,HOGE=0000";
		//$m3u8[] = "*****";


		$cnt = count($m3u8);
		for ($i = 0; $i < $cnt; $i++)
		{
			$str = $m3u8[$i];

			// #EXT-X-STREAM-INF: に一致したとき
			if (preg_match('/^#EXT-X-STREAM-INF:/i', $str) === 1)
			{
				$i++;

				// 次の行が存在すれば、処理を行う
				if ($i < $cnt)
				{
					//※ファイルパスを付加する場合
					//  ファイルパスを書換えられると、サーバ上の他のファイルにも
					//  アクセス可能になるので、注意。
					//  ただ、元々外部に公開されているサーバなので、問題ないと思う
					//
					$m3u8[$i] = $url_m3u8_base. '/'. urlencode(base64_encode($m3u8[$i]));

					//※BANDWIDTHを付加する場合
					//
					//// BANDWIDTH を取得する
					//if (preg_match("/BANDWIDTH=([0-9]+)/i", $str, $matches) === 1)
					//{
					//	$bit_rate = $matches[1];
					//
					//	// bit rate を 1000で割り、K(キロ) 単位にする
					//	$bit_rate = floor($bit_rate / 1000);
					//
					//	$m3u8[$i] = $url_m3u8_base. '/'. sprintf('%04d', $bit_rate);
					//}
					//else
					//{
					//	// 取得できない場合には、空にする
					//	$m3u8[$i] = '';
					//}
				}
			}
		}


		// デバッグ用
		//echo("<HTML><PRE><BODY>");
		//echo(htmlspecialchars(implode("\r\n", $m3u8)));
		//echo("</PRE></BODY></HTML>");
	}

	/**
	 * m3u8 子ファイルの解析
	 *
	 * <pre>
	 * m3u8の子ファイルを解析します。
	 *
	 * #EXT-X-KEY:の URIを見つけて、引数のkeyファイルのURLに書換えます。
	 *
	 * #EXTINF:の1行下のURLが、相対パスの場合には、引数のm3u8のパスを付加します。
	 *
	 * </pre>
	 *
	 * @param	string $url_m3u8_base	m3u8のパス
	 * @param	string $url_key			keyファイルのURL
	 * @param	string &$m3u8			m3u8 子ファイルを 1行ごとに 配列に格納したもの
	 */
	private static function parse_m3u8_child($url_m3u8_base, $url_key, &$m3u8)
	{
		// デバッグ用
		//$bit_rate   = 768;
		//$m3u8 = array();
		//$m3u8[] = "#EXTM3U";
		//$m3u8[] = "#EXT-X-PLAYLIST-TYPE:VOD";
		//$m3u8[] = "#EXT-X-TARGETDURATION:10";
		//$m3u8[] = "#EXT-X-KEY:METHOD=AES-128,URI=\"https://xxxxx/key/enc-240k.key\"";
		//$m3u8[] = "#EXT-X-KEY:METHOD=AES-128,URI=\"https://xxxxx/key/enc-240k.key\",IV=0xaabbccddeeff";
		//$m3u8[] = "#EXT-X-KEY:METHOD=AES-128,URI=\"https://xxxxx/key/enc-240k.key\",IV=\"0xaabbccddeeff\"";
		//$m3u8[] = "#EXT-X-KEY:METHOD=AES-128,URI=\"https://xxxxx/key/enc-240k.key\",IV=\"0xaabbccddeeff\",IV2=\"0xaabbccddeeff\"";
		//$m3u8[] = "#EXT-X-KEY:METHOD=AES-128,URI=\"https://xxxxx/key/e,n,c,-240k.key\",IV=0xaabbccddeeff";
		//$m3u8[] = "#EXT-X-KEY:METHOD=AES-128,URI=https://xxxxx/key/enc-240k.key";
		//$m3u8[] = "#EXT-X-KEY:METHOD=AES-128,URI=https://xxxxx/key/enc-240k.key,IV=0xaabbccddeeff";
		//$m3u8[] = "#EXTINF:10,";
		//$m3u8[] = "http://aksmart.showtime.jp/storage001/sample/hlstest/enconly/file-240k-00001.ts";
		//$m3u8[] = "#EXTINF:10,";
		//$m3u8[] = "http://aksmart.showtime.jp/storage001/sample/hlstest/enconly/file-240k-00002.ts";
		//$m3u8[] = "#EXTINF:10,";
		//$m3u8[] = "file-240k-00003.ts";
		//$m3u8[] = "#EXTINF:10,";
		//$m3u8[] = "file-240k-00004.ts";
		//$m3u8[] = "#EXTINF:10,";


		$cnt = count($m3u8);
		for ($i = 0; $i < $cnt; $i++)
		{
			$str = $m3u8[$i];


			// #EXTINF: に一致したとき
			if (preg_match('/^#EXTINF:/i', $str) === 1)
			{
				$i++;

				// 次の行が存在すれば、処理を行う
				if ($i < $cnt)
				{
					$tmp = parse_url($m3u8[$i]);

					if ($tmp === false || isset($tmp['scheme']) === false)
					{
						$m3u8[$i] = $url_m3u8_base. '/'. $m3u8[$i];
					}
				}
			}
			// #EXT-X-KEY: に一致したとき
			else if (preg_match('/^#EXT-X-KEY:/i', $str) === 1)
			{
				$m3u8[$i] = '';

				$match = '';

				// URI を取得する
				// " 有り、無し で、処理を 分ける

				// " 有りの場合
				if (preg_match('/URI="(.+?)"/i', $str, $matches) === 1)
				{
					$match = $matches[0];
				}
				// " 無しの場合
				else if (preg_match('/URI=([^,]+)/i', $str, $matches) === 1)
				{
					$match = $matches[0];
				}

				// 検索にマッチした場合には、URIを置き換える
				if (strlen($match) > 0)
				{
					$uri = 'URI="'. $url_key. '"';

					$m3u8[$i] = str_replace($match, $uri, $str);
				}

				// KEYは、1つとの前提により、
				// 以降の処理は無駄になるので、ここで処理を終える
				//break;
			}

		}


		// デバッグ用
		//echo("<HTML><PRE><BODY>");
		//echo("\r\n");
		//echo(htmlspecialchars(implode("\r\n", $m3u8)));
		//echo("</PRE></BODY></HTML>");
	}

}
?>
