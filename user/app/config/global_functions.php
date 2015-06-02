<?php
/**
 * This is the shortcut to DIRECTORY_SEPARATOR
 */
defined('DS') or define('DS',DIRECTORY_SEPARATOR);

/**
 * This is the shortcut to Yii::app()
 */
function app()
{
    return Yii::app();
}

/**
 * This is the shortcut to Yii::app()->clientScript
 */
function cs()
{
    // You could also call the client script instance via Yii::app()->clientScript
    // But this is faster
    return Yii::app()->getClientScript();
}

/**
 * This is the shortcut to Yii::app()->user.
 */
function user()
{
    return Yii::app()->getUser();
}

/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route = '',$params=array(),$ampersand='&')
{
	if(preg_match('@^http@' , $route)) return $route;
	return app()->createUrl($route,$params,$ampersand);
}


function httpUrl($ssl = false , $route = '',$params=array(),$ampersand='&'){
	if(preg_match('@^http@' , $route)) return $route;
	if(USE_SSL && $ssl){
		$prefix = 'https://' . getenv('HTTP_HOST');
	}else{
		$prefix = 'http://' . getenv('HTTP_HOST');
	}
	return $prefix . app()->createUrl($route,$params,$ampersand);
}

function sslUrl($route = '',$params=array(),$ampersand='&')
{
    return httpUrl($ssl = true , $route , $params , $ampersand);
}

// Http simple url: does not contain malltype
function httpSpUrl($route = '', $ssl = false)
{
	if(preg_match('@^http@' , $route)) return $route;

	if(USE_SSL && $ssl){
		$prefix = 'https://' . getenv('HTTP_HOST');
	}else{
		$prefix = 'http://' . getenv('HTTP_HOST');
	}

	if(!empty($route) && $route[0] != '/') $route = '/' . $route;

	return $prefix . $route;
}

/**
 * This is the shortcut to CHtml::encode
 */
function hsp($text)
{
	return CHtml::encode($text);
}

/**
 * This is the shortcut to "echo hsp"
 */
function esp($text)
{
    echo hsp($text);
}

/**
 * This is the shortcut to CHtml::link()
 */
function atag($text, $url = '#', $htmlOptions = array())
{
    return CHtml::link($text, $url, $htmlOptions);
}

/**
 * This is the shortcut to Yii::app()->request
 */
function request()
{
    return Yii::app()->request;
}

function now(){
	if(! defined('_NOW')) return time();
	return _NOW;
}


function addlog($msg,$level=CLogger::LEVEL_INFO,$category='oad'){
	$traces=debug_backtrace();
	$count=0;
	foreach($traces as $trace)
	{
		$msg.=" in ".$trace['file'].' ('.$trace['line'].')';
		break;
	}

	$logger = Yii::getLogger();
	$logger->log($msg,$level,$category);
	$logger->flush(true);
}

//現在時刻を通常の日付形式で取得
function getCurrentDateTime(){
	return getDateTime(now());
}

//通常の日付形式を取得
function getDateTime($val){
	if(!is_numeric($val)) $val = strtotime($val);
	return date("Y-m-d H:i:s" , $val);
}

//Get day between 2 dates
function getDayDiff($date1,$date2){
	if(!is_numeric($date1)) $date1 = strtotime($date1);
	if(!is_numeric($date2)) $date2 = strtotime($date2);
	return ($date1 - $date2) / 86400; //86400 = 1 days
}

//表示用の日付を取得
function getDisplayDate($val){
	if(!is_numeric($val)) $val = strtotime($val);
	return date("Y/m/d" , $val);
}

//表示用の日時を取得
function getDisplayDateTime($val){
	if(!is_numeric($val)) $val = strtotime($val);
	return date("Y/m/d H:i" , $val);
}

//表示用の配信終了日を取得
function getDisplayFinishDateTimeMpack($str_dt){
	if(strtotime($str_dt) < strtotime('2099-01-01')){
		return '配信終了日：' . getDisplayDateTime($str_dt);
	}
	return '';
}

//ポイント有効期限算出等用 $interval=5 で今月を含む6ヶ月の最後の日付を取得
function getLastDateOfMonth($time , $interval){
	return getDateTime(mktime(0 , 0 , 0 , date('n' , $time) + $interval +1 , 1 , date('Y' , $time) ) -1);
}

//ポイント有効期限算出等用 $interval=5 で今月を含む6ヶ月の最初の日付を取得
function getFirstDateOfMonth($time , $interval){
	return getDateTime(mktime(0 , 0 , 0 , date('n' , $time) + $interval  , 1 , date('Y' , $time) ) );
}

//文字列をカットする
function cutStr($string , $length , $add = '...'){
	return mb_substr($string , 0 , $length) . $add;
}

//設定を出力する(viewで使用する)
function p($name){
	echo _p($name);
}
function _p($name){
	return isset(app()->params[$name])?app()->params[$name]:'';
}



/**
 * HTTPSでの接続か否かの判定
 *
 * Yiiの CHttpRequest::getIsSecureConnectionでは、
 * $_SERVER['HTTPS']の on/offしかチェックしないため、
 * ロードバランサー経由だと、判定が出来ない。
 * そのため、本関数では、
 * $_SERVER['HTTP_X_FORWARDED_PROTO'] もチェックします。
 *
 * @return boolean HTTPSでの接続の場合、trueを返す
 */
function isSsl()
{
	if (request()->getIsSecureConnection())
	{
		return true;
	}

	if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']))
	{
		if (strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0)
		{
			return true;
		}
	}

	/*
	if (isset($_SERVER['HTTP_X_FORWARDED_PORT']))
	{
		if ($_SERVER['HTTP_X_FORWARDED_PORT'] === 443)
		{
			$ret = true;
		}
	}
	*/

	return false;
}



/**
 * GETパラメータの取得
 *
 * key1=val1&key2=val2... の形式で返る。
 *
 * $paramの指定方法
 *   追加/変更するとき：$param['key'] = 'val';
 *   削除するとき：     $param['key'] = null; // nullを指定する
 *
 * @param array $params 追加、変更、削除するパラメータ
 * @return string GETパラメータ
 */
function getQueryString($params = array())
{
	$query_string = request()->getQueryString();

	if (count($params) == 0)
	{
		return $query_string;
	}


	$result = array();

	parse_str($query_string, $result);

	foreach ($params as $key => $val)
	{
		if (strlen($val) > 0)
		{
			$result[$key] = $val;
		}
		else if (isset($result[$key]))
		{
			unset($result[$key]);
		}
	}

	return http_build_query($result);
}



/**
 * CActiveRecordクラスの カラムの値の取得
 * 実際の処理は、クラスの属性値を取得している。
 *
 * @param class $cls クラス
 * @param string $attr 属性名
 * @param mixed $def 属性が存在しない場合に返るデフォルト値
 * @return mixed 属性値または、デフォルト値
 */
function getCol($cls, $attr, $def = '')
{
	if (isset($cls) && isset($cls->{$attr}))
	{
		return $cls->{$attr};
	}

	return $def;
}

/**
 * CActiveRecordクラスが配列場合の カラム値の取得
 * 実際の処理は、クラスが配列の場合の属性値を取得している。
 *
 * @param class $cls クラス
 * @param string $attr 属性名
 * @param mixed $def 属性が存在しない場合に返るデフォルト値
 * @param integer $i 取得する配列を指定する添え字
 * @return mixed 属性値または、デフォルト値
 */
function getACol($cls, $attr, $def = '', $i = 0)
{
	if (isset($cls) && isset($cls[$i]) && isset($cls[$i]->{$attr}))
	{
		return $cls[$i]->{$attr};
	}

	return $def;
}



//------------------------------------------------------------------------------
// 表示用テキスト
//------------------------------------------------------------------------------
/**
 * コインの表示用テキストの取得
 *
 * 通常と 本当が 違う場合 (つまりセールの場合) には、
 * 強調した表示を行う。
 * 戻値は、hsp されている。
 *
 * @param string $coin_normal 通常の消費コイン
 * @param string $coin_real   本当の消費コイン
 * @return string 表示用テキスト
 */
function hspTxtCoin($coin_normal, $coin_real)
{
	// 一応、stringへ変換し、hspする
	$coin_normal = hsp((string) $coin_normal);
	$coin_real   = hsp((string) $coin_real);

	if ($coin_normal == $coin_real)
	{
		$ret = $coin_real;
	}
	else
	{
		$ret = '【特価】<s>'. $coin_normal. '</s> ⇒ '. $coin_real;
	}

	return $ret;
}

/**
 * 本編時間の表示用テキストの取得
 *
 * @param string $length 本編時間 [秒]
 * @return string 表示用テキスト
 */
function getTxtLength($length)
{
	// 引数チェック
	if ($length < 0)
	{
		return '---';
	}

	//$hour = (int) ($length / 3600);
	//$mod  = $length % 3600;
	//$min  = (int) ($mod / 60);
	//$sec  = $mod % 60;
	$min  = (int) ($length / 60);
	$sec  = $length % 60;

	/*
	$ret = '';
	//if ($hour > 0)	$ret .= $hour. '時間';
	if ($min  > 0)		$ret .= $min.  '分';
	if ($sec  > 0)		$ret .= $sec.  '秒';
	*/
	$ret = sprintf('%d:%02d', $min, $sec);

	return $ret;
}


/**
 * 月額パックコンテンツの 新着/あとわずか の表示用テキストの取得
 *
 * @param string $days_from 開始からの経過日数 [日]
 * @param string $days_to 終了までの残り日数 [日]
 * @return string 表示用テキスト
 */
function getTxtMpackContentNewLast($days_from, $days_to)
{
	$ret = '';

	// 新着
	if ($days_from < 2)
	{
		$ret .= 'New';
	}

	// あとわずか
	if ($days_to < 2)
	{
		$ret .= '残り'. ($days_to + 1). '日';
	}

	return $ret;
}


//------------------------------------------------------------------------------
// その他
//------------------------------------------------------------------------------
/**
 * 頭文字検索の条件文の取得
 *
 * @param string $column_name カラム名
 * @param integer $capital 頭文字 (1:あ行、2:か行、3:さ行、4:た行、5:な行、6:は行、7:ま行、8:や行、9:ら行、10:わをん)
 * @return string 条件文
 */
function getConditionCapital($column_name, $capital)
{
	$condition = '';

	if (strlen($capital) > 0)
	{
		$capital = (int) $capital;
	}

	// デフォルトは、あ行にしておきます
	if ($capital < 1 || 10 < $capital)
	{
		$capital = 1;
	}


	switch ($capital)
	{
	case  1:	$condition = "LEFT($column_name, 1) BETWEEN 'ぁ' AND 'お'";	break;
	case  2:	$condition = "LEFT($column_name, 1) BETWEEN 'か' AND 'ご'";	break;
	case  3:	$condition = "LEFT($column_name, 1) BETWEEN 'さ' AND 'ぞ'";	break;
	case  4:	$condition = "LEFT($column_name, 1) BETWEEN 'た' AND 'ど'";	break;
	case  5:	$condition = "LEFT($column_name, 1) BETWEEN 'な' AND 'の'";	break;
	case  6:	$condition = "LEFT($column_name, 1) BETWEEN 'は' AND 'ぽ'";	break;
	case  7:	$condition = "LEFT($column_name, 1) BETWEEN 'ま' AND 'も'";	break;
	case  8:	$condition = "LEFT($column_name, 1) BETWEEN 'ゃ' AND 'よ'";	break;
	case  9:	$condition = "LEFT($column_name, 1) BETWEEN 'ら' AND 'ろ'";	break;
	case 10:	$condition = "LEFT($column_name, 1) BETWEEN 'ゎ' AND 'ん'";	break;
	}

	return $condition;
}

/**
 * convert string to alias
 */
function convert($str)
{
	$str = strip_tags($str);
	$chars = array(
		''  =>  array('"','\'','  ',' -','- ',':','?','~','!','@','#','$','%','*',';',',','.','&','\\'),
		'-' =>  array(' ','  ','#','@','!','#','-','/'),
		'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă','A'),
		'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê','E'),
		'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị','I'),
		'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ','O'),
		'u'	=>	array('U','ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ','Y'),
		'd'	=>	array('đ','Đ','D'),
		'b'=>array('B'),
		'c'=>array('C'),
		'f'=>array('F'),
		'g'=>array('G'),
		'h'=>array('H'),
		'j'=>array('J'),
		'k'=>array('K'),
		'l'=>array('L'),
		'm'=>array('M'),
		'n'=>array('N'),
		'p'=>array('P'),
		'q'=>array('Q'),
		'r'=>array('R'),
		's'=>array('S'),
		't'=>array('T'),
		'v'=>array('V'),
		'x'=>array('X'),
		'z'=>array('Z'),
		'w'=>array('W'),
	);

	foreach ($chars as $key => $arr)
		foreach ($arr as $val)
			$str = str_replace($val,$key,$str);
	return $str;
}
/**
 *
 * Delete Image file
 * @param string $path path to file
 * @param string $image file name
 */
function deleteImage($path, $image)
{
	if(is_file($path.$image)){
		if(unlink($path.$image))
			return true;
	}
}
/**
 *
 * translate language
 * @param string
 * @param $flag true echo, false return
 */
function lang($name, $flag = 'true')
{
	if($name){
		$lang = Yii::t('lang',$name);
		if(!$flag)
			return $lang;
		echo $lang;
	}
}
