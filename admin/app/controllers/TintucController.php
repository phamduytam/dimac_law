<?php
class TintucController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$cat_id = request()->getQuery('cat_id', '');
		$model = new TinTucAR("searchList");
		if($word) $model->word = $word;
		if($cat_id) $model->cat_id = $cat_id;
		$model->lang = $this->langtype;
		$content = $model->searchList();
		$this->render('index', compact('content', 'word', 'cat_id'));
	}

	public function actionAdd()
	{
		$model = new TinTucAR();
		$cat_id = request()->getQuery('cat_id', '');
		if (app()->request->getPost('TinTucAR'))
		{
			// POSTデータの取得

			$data = request()->getPost('TinTucAR');
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

		$model = new TinTucAR("get_parent");
		if($cat_id) $model->cat_id = $cat_id;
		$model->parent_id = 0;
		$model->lang = $this->langtype;
		$category = $model->get_parent();
		$this->render('add', compact('model', 'cat_id', 'category'));
	}

	public function actionEdit($id)
	{
		$tintuc = new TinTucAR();
		$model = $tintuc->findByPk($id);
		$cat_id = request()->getQuery('cat_id', '');
		if(!$model)
			return ;
		if (app()->request->getPost('TinTucAR'))
		{
			$data = request()->getPost('TinTucAR');
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
		if($cat_id) $tintuc->cat_id = $cat_id;
		$tintuc->parent_id = 0;
		$tintuc->lang = $this->langtype;
		$category = $tintuc->get_parent();
		$this->render('edit', compact('model', 'cat_id', 'category'));
	}
	public function actionDelete($id)
	{
		$model = TinTucAR::model()->findByPk($id);
		if($model->delete())
			deleteImage(dirname(dirname(app()->basePath)) . '/public_html/uploads/', $model->image);
	}
}