<?php
class RoomController extends Controller
{
	public function actionIndex(){
		$model = new RoomAR();
		$model->status = 1;
		$model->lang = $this->langtype;
		$content = $model->getList();
		$this->render('index', compact('content'));
	}

	public function actionView($id){
		$model = new RoomAR();
		$content = $model->findByPk($id);

		//otherRoom
		$model->id = $id;
		$model->lang = $this->langtype;
		$other = $model->getList();
		$this->render('view', compact('content', 'other'));
	}
}