<?php
class LuatsuController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$luatsu = new LuatSuAR("searchList");
		if($word) $luatsu->word = $word;
		$luatsu->lang = $this->langtype;
		$content = $luatsu->searchList();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new LuatSuAR();
		if (app()->request->getPost('LuatSuAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('LuatSuAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->lang = $this->langtype;
			if($model->validate())
			{
				$imageUploadFile = CUploadedFile::getInstance($model, 'image');
				if($imageUploadFile !== null){ // only do if file is really uploaded
					$imageFileName = time().$imageUploadFile->name;
					$model->image = $imageFileName;
				}
				if($model->save()){
					if($imageUploadFile !== null) // validate to save file
						$imageUploadFile->saveAs(dirname(dirname(app()->basePath)) . '/public_html/uploads/'.$imageFileName);
					user()->setFlash('messages', 'Add successful!!');
				}

			}
		}

		// linh vuc
		$tmp = new BaiVietAR("get_parent");
		$tmp->cat_id = 4;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$linhvuc = $tmp->get_parent();

		// vanphong
		$tmp = new BaiVietAR("get_parent");
		$tmp->cat_id = 2;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$vanphong = $tmp->get_parent();

		// chucdanh
		$tmp = new ChucDanhAR("findAllList");
		$tmp->lang = $this->langtype;
		$chucdanh = $tmp->findAllList();


		$this->render('add', compact('model', 'linhvuc', 'vanphong', 'chucdanh'));
	}

	public function actionEdit($id)
	{
		$luatsu = new LuatSuAR();
		$model = $luatsu->findByPk($id);
		if(!$model)
			return ;
		if (app()->request->getPost('LuatSuAR'))
		{
			$data = request()->getPost('LuatSuAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->lang = $this->langtype;
			$imageUploadFile = CUploadedFile::getInstance($model, 'image');
			if($imageUploadFile == null){
				$model->image = $_POST['hd_img'];
			}
			if($model->validate())
			{
				if($imageUploadFile !== null) // validate to save file
				{
					$image_old = $model->image;
					$imageFileName = time().$imageUploadFile->name;
					$model->image = $imageFileName;
					$ret = $imageUploadFile->saveAs(dirname(dirname(app()->basePath)) . '/public_html/uploads/'.$imageFileName);
					if($ret)
						deleteImage(dirname(dirname(app()->basePath)) . '/public_html/uploads/', $image_old);
				}

				if($model->save())
					user()->setFlash('messages', 'Edit successful!!');
			}
		}
		// linh vuc
		$tmp = new BaiVietAR("get_parent");
		$tmp->cat_id = 4;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$linhvuc = $tmp->get_parent();

		// vanphong
		$tmp = new BaiVietAR("get_parent");
		$tmp->cat_id = 2;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$vanphong = $tmp->get_parent();

		// chucdanh
		$tmp = new ChucDanhAR("findAllList");
		$tmp->lang = $this->langtype;
		$chucdanh = $tmp->findAllList();

		$this->render('edit', compact('model', 'linhvuc', 'vanphong', 'chucdanh'));
	}
	public function actionDelete($id)
	{
		$model = LuatSuAR::model()->findByPk($id);
		if($model->delete())
			deleteImage(dirname(dirname(app()->basePath)) . '/public_html/uploads/', $model->image);
	}
}