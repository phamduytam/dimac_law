<?php

class SiteController extends Controller
{


	/**
	 * index
	 */
	public function actionIndex()
	{
		// gioi thieu DIMAC
		$id = 25;
		if($this->langtype == 'en')
			$id = 27;
		$model = new StaticAR();
		$gioithieu = $model->findByPk($id);

		// image gioithieu
		$model = new AdvertiseAR();
		$img_gioithieu = $model->findByPk(11);

		// dich vu chuyen nghiep
		$model = new BaiVietAR();
		$model->lang = $this->langtype;
		$dichvu = $model->getDichVu();

		// tin tuc

		$model = new TinTucAR();
		$model->lang = $this->langtype;
		$tintuc = $model->getNew();

		$this->pageTitle = "DIMAC PROFESSIONAL CORPORATE LAWYERS";
		$this->render('index', compact('advertise', 'gioithieu', 'img_gioithieu', 'dichvu', 'tintuc'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);

			//favicon.icoへのリクエストはログに記録しない
			if(Yii::app()->request->getPathInfo() === 'favicon.ico')
			{
				Yii::app()->log->setRoutes(array(array(),));
			}
		}
	}

}