<?php

class TopController extends Controller
{

	public function actionIndex()
	{
		$fn = 'setContent' . ucfirst($this->malltype);
		Top::$category_id = $this->getCategoryId();
		$this->render('index', array('topContent' => Top::$fn()));
	}

	public function actionAge_verify()
	{
		$ageVerifiedUri = user()->getFlash('ageVerifiedUri');
		if (request()->getPost('yes')){
			user()->ageVerify();
			if ($ageVerifiedUri){
				$this->redirect($ageVerifiedUri);
			}else{
				$this->redirect(url(''));
			}
		}elseif (request()->getPost('no')){
			user()->ageUnverify();
			$this->redirect(url());
		}
		if ($ageVerifiedUri){
			user()->setFlash('ageVerifiedUri', $ageVerifiedUri);
		}
		$this->render('age_verify');
	}
}
