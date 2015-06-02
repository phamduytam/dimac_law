<?php
class GalleryController extends Controller
{
	public function actionIndex(){
		$model = new GalleryAR();
		$model->lang = $this->langtype;
		$content = $model->searchList(9);
		$this->render('index', compact('content'));
	}

	public function actionView($id){
		$model = new GalleryAR();
		$content = $model->findByPk($id);

		//otherGallery
		$model->id = $id;
		$model->lang = $this->langtype;
		$other = $model->getList();

		$this->render('view', compact('content', 'other'));
	}

	public function actionListGallery(){
		$this->render('listImage');
	}
}