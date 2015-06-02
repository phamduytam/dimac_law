<?php
class TuVanController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$cat_id = request()->getQuery('cat_id', '');
		$tuvan = new TuVanAR("searchListTuVan");
		if($word) $tuvan->word = $word;
		if($cat_id) $tuvan->cat_id = $cat_id;
		$tuvan->lang = $this->langtype;
		$content = $tuvan->searchListTuVan();
		$this->render('index', compact('content', 'word', 'cat_id'));
	}

	public function actionAdd()
	{
		$model = new TuVanAR();
		$cat_id = request()->getQuery('cat_id', '');
		if (app()->request->getPost('TuVanAR'))
		{
			// POSTデータの取得

			$data = request()->getPost('TuVanAR');
			$model->attributes = $data;
			$model->cat_id = $cat_id;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->lang = $this->langtype;

			if($model->validate())
			{
				$imageUploadFile = CUploadedFile::getInstance($model, 'image');
				if($imageUploadFile !== null){ // only do if file is really uploaded
					$imageFileName = mktime().$imageUploadFile->name;
					$model->image = $imageFileName;
				}
				if($model->save()){
					if($imageUploadFile !== null) // validate to save file
						$imageUploadFile->saveAs(dirname(dirname(app()->basePath)) . '/public_html/uploads/'.$imageFileName);
					user()->setFlash('messages', 'Add successful!!');
				}

			}
		}

		$tuvan = new TuVanAR("get_parent");
		if($cat_id) $tuvan->cat_id = $cat_id;
		$tuvan->parent_id = 0;
		$tuvan->lang = $this->langtype;
		$category = $tuvan->get_parent();
		$this->render('add', compact('model', 'cat_id', 'category'));
	}

	public function actionEdit($id)
	{
		$tuvan = new TuVanAR();
		$model = $tuvan->findByPk($id);
		$cat_id = request()->getQuery('cat_id', '');
		if(!$model)
			return ;
		if (app()->request->getPost('TuVanAR'))
		{
			$data = request()->getPost('TuVanAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->lang = $this->langtype;
			$imageUploadFile = CUploadedFile::getInstance($model, 'image');
			if($model->validate())
			{
				if($imageUploadFile !== null) // validate to save file
				{
					$image_old = $model->image;
					$imageFileName = mktime().$imageUploadFile->name;
					$model->image = $imageFileName;
					$ret = $imageUploadFile->saveAs(dirname(dirname(app()->basePath)) . '/public_html/uploads/'.$imageFileName);
					if($ret)
						deleteImage(dirname(dirname(app()->basePath)) . '/public_html/uploads/', $image_old);
				}

				if($model->save())
					user()->setFlash('messages', 'Edit successful!!');
			}
		}
		$category = array('Bài viết mới');
		if($cat_id) $tuvan->cat_id = $cat_id;
		$tuvan->parent_id = 0;
		$tuvan->lang = $this->langtype;
		$category = $tuvan->get_parent();
		$this->render('edit', compact('model', 'cat_id', 'category'));
	}
	public function actionDelete($id)
	{
		$model = TuVanAR::model()->findByPk($id);
		if($model->delete())
			deleteImage(dirname(dirname(app()->basePath)) . '/public_html/uploads/', $model->image);
	}
}