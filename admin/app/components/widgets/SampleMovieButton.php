<?php
/**
 * SampleMovieButton class file.
 *
 */

/**
 * サンプル再生ボタンのウィジェット
 *
 */
class SampleMovieButton extends BaseWidget
{
	/**
	 * 一覧用のボタンの表示
	 *
	 * @param Controller $controller コントローラ
	 * @param boolean $isGuest ログイン済みか否か
	 * @param integer $sample_flag サンプル動画フラグ
	 * @param string $sample_url サンプル動画のURL
	 */
	public static function renderButtonList($controller, $isGuest, $sample_flag, $sample_url)
	{
		$html = '';

		$icon = false;
		$htmlOptions = array('class'=>'btn-custom s_btn', 'align'=>'center', 'style'=>'width:50%;');

		$html .= self::getHtml($controller, $isGuest, $sample_flag, $sample_url, $icon, $htmlOptions);

		echo $html;
	}

	/**
	 * HTMLコードの取得
	 *
	 * @param Controller $controller コントローラ
	 * @param boolean $isGuest ログイン済みか否か
	 * @param integer $sample_flag サンプル動画フラグ
	 * @param string $sample_url サンプル動画のURL
	 * @param boolean $icon アイコンを表示するか否か
	 * @param array $htmlOptions buttonタグの属性
	 * @return string HTMLコード
	 */
	private static function getHtml($controller, $isGuest, $sample_flag, $sample_url, $icon, $htmlOptions)
	{
		$html  = '';


		$add_a = false;

		if ($sample_flag != 1)
		{
			$htmlOptions['disabled'] = true;
		}
		else if ($isGuest)
		{
			//$htmlOptions['onclick'] =
			//	'if (! confirm("ログインしますか？"))'.
			//		'return false;'.
			//	'location.href = "'. $controller->url(true, '/login'). '";'.
			//	'return true;';

			//$htmlOptions['onclick'] = 'alert("ログインして下さい。");';

			$htmlOptions['onclick'] = 'location.href="'. $controller->url(true, '/login'). '";';
		}
		else
		{
			$add_a = true;
		}


		$html .= '<button '. CHtml::renderAttributes($htmlOptions). '>';
		if ($icon)
		{
			$html .= '<i class="icon-film"></i> ';
		}
		$html .= 'サンプル動画';
		$html .= '</button>';


		if ($add_a)
		{
			$html = '<a href="'. hsp($sample_url). '">'. $html. '</a>';
		}

		return $html;
	}



}
?>
