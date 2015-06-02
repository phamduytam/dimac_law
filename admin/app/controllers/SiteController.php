<?php

class SiteController extends Controller
{
	public $sslAction = array('login', 'changePassword');

	/**
	 * index
	 */
	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * login
	 */
	public function actionLogin()
	{
		$messages = array();

		$model = new AdminAR('login');
		if (app()->request->getPost('login'))
		{
			// POSTデータの取得
			$model->attributes = request()->getPost('AdminAR');

			// 認証
			$auth = new AdminAuth($model->username, $model->password);
			if ($auth->authenticate())
			{
				user()->login($auth);
				$next = sslUrl('/') . '/';
				$this->redirect($next);
				return;
			}

			$messages[] = 'Dang nhap sai, vui long kiem tra lai thong tin';
		}
		user()->logout();

		user()->setFlash('messages', $messages);
		$this->render('login' , compact('model'));
	}

	/**
	 * logout
	 */
	public function actionLogout()
	{
		user()->logout();
		$this->redirect(array('/login'));
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

	public function actionProfile(){
		$username = user()->getId();
		$admin = new AdminAR();
		$model = $admin->findByPk($username);
		$model->scenario = 'profile';
		if(request()->getPost('AdminAR'))
		{
			$model->attributes = request()->getPost('AdminAR');
			if($model->validate())
			{
				if($model->save())
				{
					user()->setFlash('messages', 'Update successful!!');
				}
			}
		}
		$this->render('profile', compact('model'));
	}

	public function actionChangePassword()
	{
		$username = user()->getId();
		$admin = new AdminAR();
		$model = $admin->findByPk($username);
		$model->scenario = 'changePassword';
		if(request()->getPost('AdminAR'))
		{
			$model->attributes = request()->getPost('AdminAR');
			if($model->validate())
			{
				if($model->save())
					user()->setFlash('messages', 'Update successful!!');
			}
		}
		$this->render('changePassword', compact('model'));
	}

}