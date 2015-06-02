<?php

class StaticController extends Controller
{
	public function actionIndex()
	{
		$model = new StaticAR();
		$word = request()->getQuery('word', '');
		if($word) $model->word = $word;
		$model->lang = $this->langtype;
		$content = $model->searchListStatic();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new StaticAR();
		if (app()->request->getPost('StaticAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('StaticAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->lang = $this->langtype;

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
		$static = new StaticAR();
		$model = $static->findByPk($id);
		if(!$model)
			return ;
		if (app()->request->getPost('StaticAR'))
		{
			$data = request()->getPost('StaticAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->lang = $this->langtype;
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
		$model = StaticAR::model()->findByPk($id);
		if($model->delete())
			return true;
	}
}