<?php
class DichVuController extends Controller
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
		$order = request()->getQuery('order_select', '');;
		$selected = request()->getQuery('selected', '');
		if ($order) $model->order_select = $order;
		if ($selected) $model->selected = $selected;
		if($model->validate())
		{
			if($model->save())
				user()->setFlash('messages', 'Edit successful!!');
		}
	}
}