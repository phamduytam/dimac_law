<?php
class ContactController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$model = new ContactAR('searchListContact');
		if($word) $model->word = $word;
		$content = $model->searchListContact();
		$this->render('index', compact('content', 'word'));
	}

	public function actionView($id)
	{
		$model = ContactAR::model()->findByPk($id);
		if($model)
		{
			$model->status = 0;
			$model->save($model->status);
			$model->created = date('d-m-Y H:i:s', strtotime($model->created));
		}
		$this->render('view', compact('model'));
	}

	public function actionDelete($id)
	{
		$model = ContactAR::model()->findByPk($id);
		if($model->delete())
			return true;
	}
}