<?php
/**
 * Cookieの 基底モデル
 *
 */
abstract class BaseCookie
{
	/**
	 * @var データ
	 */
	private $_data = array();

	/**
	 * @var データの最大個数
	 */
	private $_max = 3;

	/**
	 * @var データのセパレータ
	 */
	private $_sp = ',';

	/**
	 * @var 保存時にBASE64エンコードを行うか否か
	 */
	private $_base64 = false;

	/**
	 * @var Cookieのオプション。See {@link CHttpCookie::__construct()}
	 */
	private $_cookieOptions = array();



	/**
	 * データの最大個数の設定
	 *
	 * @param integer $max データの最大個数
	 */
	public function setMax($max)
	{
		$this->_max = $max;
	}

	/**
	 * データのセパレータの設定
	 *
	 * @param string $sp データのセパレータ
	 */
	public function setSp($sp)
	{
		$this->_sp = $sp;
	}

	/**
	 * 保存時にBASE64エンコードを行うか否かの設定
	 *
	 * @param boolean $base64 保存時にBASE64エンコードを行うか否か
	 */
	public function setBase64($base64)
	{
		$this->_base64 = $base64;
	}

	/**
	 * Cookieのオプションの設定
	 *
	 * @param array $cookieOptions Cookieのオプション
	 */
	public function setCookieOptions($cookieOptions)
	{
		$this->_cookieOptions = $cookieOptions;
	}



	/**
	 * クッキー名の取得
	 *
	 * @return string クッキー名
	 */
	abstract public function cookieName();

	/**
	 * クッキーのドメインの取得
	 *
	 * @return string クッキーのドメイン
	 */
	public function cookieDomain()
	{
		$ret = '';

		if ($this->_cookieOptions['domain'])
		{
			$ret = $this->_cookieOptions['domain'];
		}

		return $ret;
	}

	/**
	 * クッキーのパスの取得
	 *
	 * @return string クッキーのパス
	 */
	public function cookiePath()
	{
		$ret = '';

		if ($this->_cookieOptions['path'])
		{
			$ret = $this->_cookieOptions['path'];
		}

		return $ret;
	}

	/**
	 * 一件取得
	 *
	 * @param integer $index 取得データの指定
	 * @return string data
	 */
	public function get($index = 0)
	{
		// getの前に、loadして、データを最新にする
		$this->load();

		$ret = null;

		if (0 <= $index && $index < count($this->_data))
		{
			$ret = $this->_data[$index];
		}

		return $ret;
	}

	/**
	 * 全件取得
	 *
	 * @param integer $start  取得開始位置
	 * @param integer $length 取得件数
	 * @return array data
	 */
	public function getAll($start = 0, $length = -1)
	{
		// getAllの前に、loadして、データを最新にする
		$this->load();

		$ret = array();

		$pos = 0;
		$num = 0;
		foreach ($this->_data as $data)
		{
			if ($pos++ < $start)						continue;
			if ($length != -1 && $length <= $num++)		break;

			$ret[] = $data;
		}

		return $ret;
	}

	/**
	 * add
	 *
	 * @param string $data data
	 * @param boolean $duplicate Flag of can be duplicate.
	 */
	public function add($data, $duplicate = false)
	{
		// addの前に、loadして、データを最新にする
		$this->load();


		if (! $duplicate)
		{
			$tmp = array();
			foreach ($this->_data as $val)
			{
				if ($val == $data)	continue;
				$tmp[] = $val;
			}

			// 重複したデータが存在した場合
			if (count($this->_data) != count($tmp))
			{
				$this->_data = $tmp;
				//Yii::log('duplicate == '. $data);
			}
		}


		array_unshift($this->_data, $data);

		$num = count($this->_data) - $this->_max;

		for ($i = 0; $i < $num; $i++)
		{
			array_pop($this->_data);
		}

		$this->save();
	}

	/**
	 * clear
	 */
	public function clear()
	{
		$this->_data = array();

		unset(request()->cookies[$this->cookieName()]);
	}

	/**
	 * load
	 */
	private function load()
	{
		$this->_data = array();

		if (! is_object(request()->cookies[$this->cookieName()]))
		{
			return;
		}

		$str = request()->cookies[$this->cookieName()]->value;

		$tmp = explode($this->_sp, $str);
		//Yii::log("load == ". $str);

		foreach ($tmp as $val)
		{
			$this->_data[] = ($this->_base64) ? base64_decode($val) : $val;
		}
	}

	/**
	 * save
	 */
	private function save()
	{
		$tmp = array();

		foreach ($this->_data as $val)
		{
			$tmp[] = ($this->_base64) ? base64_encode($val) : $val;
		}

		$str = implode($this->_sp, $tmp);
		//Yii::log("save == ". $str);


		$options = array();
		if (is_array($this->_cookieOptions))
		{
			$options = $this->_cookieOptions;
		}
		//Yii::log('cookieName    == '. $this->cookieName());
		//Yii::log('cookieOptions == '. implode(',', $options));

		$cookie = new CHttpCookie($this->cookieName(), $str, $options);

		request()->cookies[$this->cookieName()] = $cookie;
	}

}
