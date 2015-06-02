<?php
class DichvuController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$cat_id = request()->getQuery('cat_id', '');
		$model = new BaiVietAR("searchList");
		if($word) $model->word = $word;
		if($cat_id) $model->cat_id = $cat_id;
		$model->lang = $this->langtype;
		$content = $model->searchList();
		$this->render('index', compact('content', 'word', 'cat_id'));
	}

	public function actionUpdate($id) {
		$baiviet = new BaiVietAR();
		$model = $baiviet->findByPk($id);
		if(!$model)
			return ;
		$order = isset($_GET['order_select']) ? $_GET['order_select'] : '';
		$selected = isset($_GET['selected']) ? $_GET['selected'] : '';
		if ($order != '') $model->order_select = $order;
		if ($selected != '') $model->selected = $selected;
		//echo $model->selected;
		if($model->validate())
		{
			$model->save();
				
		}
	}
}