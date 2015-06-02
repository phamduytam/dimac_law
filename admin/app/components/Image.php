<?php
class Image
{
	private static $_vtype = '';
	public static  function init(){
		if(!DigitalOadTMpackRegistAR::checkRegist()){
			self::$_vtype = 'V';
		}
	}

	private static function getPrefix(){
		return app()->params['shareRemote']. '/images2';
	}

	public static function getTopMain($imageName, $alt='', $attrs=array('style'=>'width:100%')){
		$url = sprintf('%s/top/top_main_%s.jpg',
			self::getPrefix(),
			$imageName
		);

		if(!$alt) $alt = $imageName;
		return CHtml::image($url , $alt , $attrs);
	}

	/**
	 * 画像の取得の基本関数。
	 *
	 * @param string $src src属性の値
	 * @param string $alt alt属性の値
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	private static function getBase_Ex($src, $alt = '', $htmlOptions = array()){
		return CHtml::image($src, $alt, $htmlOptions);
	}

	/**
	 * 画像のsrcの取得の基本関数。
	 *
	 * src属性は、以下になる。
	 * 『<prefix> / <type> / <id>_<imageName>[ _<no> ].jpg』を取得する
	 *
	 * @param string $type 種別。maker、series、、など
	 * @param string $id 各ID
	 * @param string $imageName 画像名。main、list、、など
	 * @param string $no 画像番号
	 * @return string 画像のsrc
	 */
	private static function getBase_Src($type, $id, $imageName, $no = ''){
		if(strlen($no)>0)
			$img = sprintf('%s_%s_%s', $id, $imageName, $no);
		else
			$img = sprintf('%s_%s', $id, $imageName);

		$src = sprintf('%s/%s/%s/%s.jpg',
			self::getPrefix(),
			$type,
			$id,
			$img
		);

		return $src;
	}

	/**
	 * 画像の取得の基本関数。
	 *
	 * @param string $type 種別。maker、series、、など
	 * @param string $id 各ID
	 * @param string $imageName 画像名。main、list、、など
	 * @param string $no 画像番号
	 * @param string $alt alt属性の値
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	private static function getBase($type, $id, $imageName, $no = '', $alt = '', $htmlOptions = array()){
		$src = self::getBase_Src($type, $id, $imageName, $no);

		return self::getBase_Ex($src, $alt, $htmlOptions);
	}


	/**
	 * メーカーのメイン画像の取得
	 *
	 * @param string $makerId メーカーID
	 * @param string $makerName メーカー名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getMakerMain($makerId, $makerName, $htmlOptions){
		return self::getBase('maker', $makerId, 'main', '', $makerName, $htmlOptions);
	}

	/**
	 * シリーズのメイン画像の取得
	 *
	 * @param string $seriesId シリーズID
	 * @param string $seriesName シリーズ名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getSeriesMain($seriesId, $seriesName, $htmlOptions){
		return self::getBase('series', $seriesId, 'main', '', $seriesName, $htmlOptions);
	}

	/**
	 * ジャンルのメイン画像の取得
	 *
	 * @param string $genreId ジャンルID
	 * @param string $genreName ジャンル名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getGenreMain($genreId, $genreName, $htmlOptions){
		return self::getBase('genre', $genreId, 'main', '', $genreName, $htmlOptions);
	}


	/**
	 * タレントのメイン画像の取得
	 *
	 * @param string $talentId タレントID
	 * @param string $talentName タレント名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getTalentMain($talentId, $talentName, $htmlOptions){
		return self::getBase('talent', $talentId, 'main', '', $talentName, $htmlOptions);
	}

	/**
	 * コンテンツの画像のsrcの取得
	 *
	 * @param string $contentId コンテンツID
	 * @param string $imageName 画像名。main、list、、など
	 * @param string $no 画像番号
	 * @return string 画像のsrc
	 */
	public static function getContent_Src($contentId, $imageName, $no){
		$work = preg_split('//', substr($contentId, -4, 4));

		if(strlen($no)>0)
			$img = sprintf('%s_%s_%s%s', $contentId, $imageName, $no, self::$_vtype);
		else
			$img = sprintf('%s_%s%s', $contentId, $imageName, self::$_vtype);

		$src = sprintf('%s/%s/%s/%s/%s/%s.jpg',
			self::getPrefix(),
			'content',
			$work[4]. $work[3],
			$work[2]. $work[1],
			$contentId,
			$img
		);

		return $src;
	}

	/**
	 * コンテンツのメインの画像のsrcの取得
	 *
	 * @param string $contentId コンテンツID
	 * @param integer $no 番号
	 * @return string 画像のsrc
	 */
	public static function getContentMainSrc($contentId, $no){
		$no = sprintf('%02d', $no);

		return self::getContent_Src($contentId, 'main', $no);
	}

	/**
	 * 月額パック コンテンツのメインの画像のsrc取得
	 *
	 * @param string $contentId コンテンツID
	 * @return string the generated image tag
	 */
	public static function getContentMpackMainSrc($contentId){
		return self::getContent_Src($contentId, 'm_main', '');
	}

	/**
	 * コンテンツのシーン画像のsrc取得
	 *
	 * @param string $contentId コンテンツID
	 * @param integer $no シーン番号
	 * @return string 画像のsrc
	 */
	public static function getContentSceneSrc($contentId, $no){
		$no = sprintf('%02d', $no);

		return self::getContent_Src($contentId, 'scene', $no);
	}

	/**
	 * コンテンツのシーン画像の取得
	 *
	 * @param string $contentId コンテンツID
	 * @param integer $no シーン番号
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getContentScene($contentId, $contentName, $no, $htmlOptions){
		$src = self::getContentSceneSrc($contentId, $no);

		$contentName = $contentName . 'シーン'. sprintf('%02d', $no);

		return self::getBase_Ex($src, $contentName, $htmlOptions);
	}

	/**
	 * コンテンツのリストA画像のsrcの取得
	 *
	 * @param string $contentId コンテンツID
	 * @return string 画像のsrc
	 */
	public static function getContentListASrc($contentId){
		return self::getContent_Src($contentId, 'list_a', '');
	}

	/**
	 * コンテンツのリストA画像の取得
	 *
	 * @param string $contentId コンテンツID
	 * @param string $contentName コンテンツ名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getContentListA($contentId, $contentName, $htmlOptions){
		$src = self::getContentListASrc($contentId);

		return self::getBase_Ex($src, $contentName, $htmlOptions);
	}

	/**
	 * コンテンツのリストB画像のsrcの取得
	 *
	 * @param string $contentId コンテンツID
	 * @return string 画像のsrc
	 */
	public static function getContentListBSrc($contentId){
		return self::getContent_Src($contentId, 'list_b', '');
	}

	/**
	 * コンテンツのリストB画像の取得
	 *
	 * @param string $contentId コンテンツID
	 * @param string $contentName コンテンツ名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getContentListB($contentId, $contentName, $htmlOptions){
		$src = self::getContentListBSrc($contentId);

		return self::getBase_Ex($src, $contentName, $htmlOptions);
	}

	/**
	 * コンテンツのリストC画像のsrcの取得
	 *
	 * @param string $contentId コンテンツID
	 * @return string 画像のsrc
	 */
	public static function getContentListCSrc($contentId){
		return self::getContent_Src($contentId, 'list_c', '');
	}

	/**
	 * コンテンツのリストC画像の取得
	 *
	 * @param string $contentId コンテンツID
	 * @param string $contentName コンテンツ名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getContentListC($contentId, $contentName, $htmlOptions){
		$src = self::getContentListCSrc($contentId);

		return self::getBase_Ex($src, $contentName, $htmlOptions);
	}

	/**
	 * コンテンツのリストD画像のsrcの取得
	 *
	 * @param string $contentId コンテンツID
	 * @return string 画像のsrc
	 */
	public static function getContentListDSrc($contentId){
		return self::getContent_Src($contentId, 'list_d', '');
	}

	/**
	 * コンテンツのリストD画像の取得
	 *
	 * @param string $contentId コンテンツID
	 * @param string $contentName コンテンツ名
	 * @param array $htmlOptions imgタグの属性
	 * @return string the generated image tag
	 */
	public static function getContentListD($contentId, $contentName, $htmlOptions){
		$src = self::getContentListDSrc($contentId);

		return self::getBase_Ex($src, $contentName, $htmlOptions);
	}
}
?>