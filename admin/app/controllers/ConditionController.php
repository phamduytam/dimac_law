<?php

class ConditionController extends Controller
{
	public function actionIndex()
	{
		$model = new ConditionAR();
		$word = request()->getQuery('word', '');
		if($word) $model->word = $word;
		$model->lang = $this->langtype;
		$content = $model->searchList();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new ConditionAR();
		if (app()->request->getPost('ConditionAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('ConditionAR');
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
		$condition = new ConditionAR();
		$model = $condition->findByPk($id);
		if(!$model)
			return ;
		if (app()->request->getPost('ConditionAR'))
		{
			$data = request()->getPost('ConditionAR');
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
		$model = ConditionAR::model()->findByPk($id);
		if($model->delete())
			return true;
	}
}