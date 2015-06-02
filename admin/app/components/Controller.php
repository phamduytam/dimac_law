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
	public $layout='//layouts/right';
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

	public function init()
	{
	}

	protected function beforeAction($action)
	{
		if($langtype = request()->getQuery("langtype")){
			$this->langtype = $langtype;
		}

		$this->baseUrl = $this->langtype . '/';

		if(defined('USE_SSL') && USE_SSL === true && !isSSL() ){
			if(in_array($this->action->id , $this->sslAction)){
				$next = sslUrl("{$this->id}/{$this->action->id}" , $_GET);
				$this->redirect($next);
			}
		}
		if(!user()->getId()){
			if($this->id === 'site' && $this->action->id === 'login') return true;
			$this->redirect('/admin/login');
		}

		return true;
	}

	protected function error($Cmessage = 'System Error' , $code = 500){
		return $this->render('//site/error' , compact('Cmessage' , 'code'));
	}
}