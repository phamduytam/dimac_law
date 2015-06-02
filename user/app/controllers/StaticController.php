<?php

class StaticController extends Controller
{
	public function actionIndex()
	{
		$this->error('Page not found', '404');
			return ;
	}

	public function actionTerms() {
		$model = new StaticAR();
		$id = 20;
		if($this->langtype == 'en')
			$id = 22;
		$content = $model->findByPk($id);
		$this->render('term', compact('content'));
	}

	public function actionLink() {
		$model = new StaticAR();
		$id = 23;
		if($this->langtype == 'en')
			$id = 24;
		$content = $model->findByPk($id);
		$this->render('term', compact('content'));
	}

	public function actionSitemap() {
		$this->render('sitemap');
	}
}