<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

	public $public_controllers = array('login');

	public $sslAction = array();

	public $langtype = 'vn';

	public $baseUrl = '';

	public $description = 'Dimac law';
	public $keyword = 'dimac law';

	public function init()
	{
	}

	protected function beforeAction($action)
	{
		//check password
		//if( (!isset($_GET['password']) || $_GET['password'] != 'tam') && $this->id == 'site')
			//$this->redirect(app()->baseUrl.'/index.html');

		if($langtype = request()->getQuery("langtype")){
			$this->langtype = $langtype;
		}
		$this->baseUrl = app()->baseUrl . $this->langtype . '/';
		// choose language
		Yii::app()->language = $this->langtype;

		if(defined('USE_SSL') && USE_SSL === true && !isSSL() ){
			if(in_array($this->action->id , $this->sslAction)){
				$next = sslUrl("{$this->id}/{$this->action->id}" , $_GET);
				$this->redirect($next);
			}
		}

		return true;
	}

	protected function error($Cmessage = 'System Error' , $code = 500){
		return $this->render('//site/error' , compact('Cmessage' , 'code'));
	}

	public function getLogo()
	{
		$model = new AdvertiseAR();
		$logo = $model->findByPk(13);
		if($logo)
			return $logo;
		return false;
	}

	public function getBanner() {
		//get image slider
		$model = new AdvertiseAR('getList');
		if(isset($_GET['alias']))
		{
			$category = new BaiVietAR();
			$alias = $_GET['alias'];
			$alias = str_replace('.html', '', $alias);
			$content = $category->findByAttributes(array('alias' => $alias, 'lang' => $this->langtype));
			
		}
		else {

			$menu = array(
				'gioithieu' => 1,
				'vanphong'	=> 2,
				'giatri'	=> 3,
				'linhvuc'	=> 4,
				'khachhang'	=> 5,
				'tintuc'	=> 6,
				'nghenghiep'	=> 7
				);
			if(isset($menu[$this->id]))
			$content->id = $menu[$this->id];
		}
		if(isset($content) && $content) {
			$model->cat_id = $content->id;
		} else {
			$model->cat_id = 1;
		}
		$model->status = 1;
		
		$advertise = $model->getList();
		if(!$advertise){
			$model->status = 1;
			$model->cat_id = 1;
			$advertise = $model->getList();
		}
		return $advertise;
	}

	public function getFollow() {
		$model = new StaticAR();
		$google = $model->findByPk(15);
		$facebook = $model->findByPk(16);
		$twitter = $model->findByPk(17);

		return array(
			'google' => strip_tags($google->content),
			'facebook' => strip_tags($facebook->content),
			'twitter' => strip_tags($twitter->content),
		);

	}

	public function getDescription()
	{
		$description = StaticAR::model()->findByPk(2);
		if($description)
			return strip_tags(html_entity_decode($description->content, ENT_QUOTES, "UTF-8"));
		else{
			return strip_tags($this->description);
		}
	}

	public function getKeyWord()
	{
		$keyword = StaticAR::model()->findByPk(3);
		if(strlen($this->keyword))
			return strip_tags(html_entity_decode($keyword->content, ENT_QUOTES, "UTF-8"));
		else{
			return strip_tags($this->keyword);
		}
	}

	public function getMenu() {
		$tuvan = new BaiVietAR();

		// Gioi thieu
		$tuvan->cat_id = 1;
		$tuvan->lang = $this->langtype;
		$tuvan->parent_id = 0;
		$gioithieu = $tuvan->getMenu();

		// Van phong
		$tuvan->cat_id = 2;
		$tuvan->lang = $this->langtype;
		$tuvan->parent_id = 0;
		$vanphong = $tuvan->getMenu();

		//giatri
		$tuvan->cat_id = 3;
		$tuvan->lang = $this->langtype;
		$tuvan->parent_id = 0;
		$giatri = $tuvan->getMenu();

		// linh vuc
		$tuvan->cat_id = 4;
		$tuvan->lang = $this->langtype;
		$tuvan->parent_id = 0;
		$linhvuc = $tuvan->getMenu();

		// khach hang
		$tuvan->cat_id = 5;
		$tuvan->lang = $this->langtype;
		$tuvan->parent_id = 0;
		$khachhang = $tuvan->getMenu();

		// tin tuc
		$model = new TinTucAR();
		$model->lang = $this->langtype;
		$model->parent_id = 0;
		$tintuc = $model->getMenu();

		// nghe nghiep
		$tuvan->cat_id = 7;
		$tuvan->lang = $this->langtype;
		$tuvan->parent_id = 0;
		$nghenghiep = $tuvan->getMenu();
		return array(
			'gioithieu'		=> $gioithieu,
			'vanphong'		=> $vanphong,
			'giatri'		=> $giatri,
			'linhvuc'		=> $linhvuc,
			'khachhang'		=> $khachhang,
			'tintuc'		=> $tintuc,
			'nghenghiep'	=> $nghenghiep
		);
	}

	/**
	 *
	 * Get sub menu
	 * @param int $cat_id // gioithieu, vanphong, giatri, linhvuc....
	 * @param int $parent_id
	 */
	public function getSubMenu($cat_id, $parent_id) {
		$tuvan = new BaiVietAR();

		// Gioi thieu
		$tuvan->cat_id = $cat_id;
		$tuvan->lang = $this->langtype;
		$tuvan->parent_id = $parent_id;
		$sub = $tuvan->getMenu();
		return $sub;
	}
}