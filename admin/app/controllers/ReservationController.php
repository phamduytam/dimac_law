<?php
class ReservationController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$model = new ReservationAR('searchList');
		if($word) $model->word = $word;
		$content = $model->searchList();
		$this->render('index', compact('content', 'word'));
	}

	public function actionView($id)
	{
		$model = ReservationAR::model()->findByPk($id);
		if($model)
		{
			$model->status = 0;
			$model->save($model->status);
			$model->checkIn = date('d-m-Y', strtotime($model->checkIn));
			$model->checkOut = date('d-m-Y', strtotime($model->checkOut));
		}
		$this->render('view', compact('model'));
	}

	public function actionDelete($id)
	{
		$model = ReservationAR::model()->findByPk($id);
		if($model->delete())
			return true;
	}
}