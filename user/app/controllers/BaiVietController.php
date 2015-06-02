<?php
class BaiVietController extends Controller
{
	public function actionIndex()
	{
		$model = new BaiVietAR();
		$model->status = 1;
		$content = $model->searchList(10);
		$this->render('index', compact('content'));
	}

	public function actionDetail($id, $alias)
	{
		$model = new BaiVietAR();
		$baiviet = $model->findByPk($id);
		if(!$baiviet)
			return ;

		$model->id = $id;
		$ortherList = $model->getListOrther(10);
		$this->render('detail', compact('baiviet', 'ortherList'));
	}
}