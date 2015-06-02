<?php
class BlogController extends Controller
{
	public function actionIndex(){
		$model = new BlogAR();
		$model->status = 1;
		$model->lang = $this->langtype;
		$content = $model->searchList(10);

		//advertise
		$model = new AdvertiseAR();
		$model->cat_id = 3;
		$advertise = $model->getList();

		$this->render('index', compact('content', 'advertise'));
	}

	public function actionView($id, $alias = ''){
		$model = new BlogAR();
		$content = $model->findByPk($id);

		//other
		$model->id = $id;
		$model->lang = $this->langtype;
		$other = $model->getOther(5);
		$this->render('view', compact('content', 'other'));
	}
}