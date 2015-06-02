<?php

class CategoryController extends Controller
{
	public function actionIndex()
	{
		$model = new CategoryAR();
		$word = request()->getQuery('word', '');
		if($word) $model->word = $word;
		$content = $model->searchListCategory();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new CategoryAR();
		if (app()->request->getPost('CategoryAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('CategoryAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());

			if($model->validate())
			{
				if($model->save()){
					user()->setFlash('messages', 'Add successful!!');
				}
			}
		}
		$this->render('add', compact('model'));
	}

	public function actionEdit($id)
	{
		$category = new CategoryAR();
		$model = $category->findByPk($id);
		if(!$model)
			return ;
		if (app()->request->getPost('CategoryAR'))
		{
			$data = request()->getPost('CategoryAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			if($model->validate())
			{
				if($model->save())
					user()->setFlash('messages', 'Edit successful!!');
			}
		}
		$this->render('edit', compact('model'));
	}
	public function actionDelete($id)
	{
		$model = CategoryAR::model()->findByPk($id);
		if($model->delete())
			return true;
	}
}