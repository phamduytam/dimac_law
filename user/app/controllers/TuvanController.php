<?php
class TuVanController extends Controller
{
	public function actionIndex()
	{
		$model = new TuVanAR();
		$model->status = 1;
		$content = $model->searchListTuVan(10);
		$this->render('index', compact('content'));
	}

	public function actionDetail($id, $alias)
	{
		$model = new TuVanAR();
		$tuvan = $model->findByPk($id);
		if(!$tuvan)
			return ;

		$model->id = $id;
		$ortherList = $model->getListOrther(10);
		$this->render('detail', compact('tuvan', 'ortherList'));
	}
}