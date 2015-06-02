<?php
class AdvertiseController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$advertise = new AdvertiseAR("searchListAdvertise");
		if($word) $advertise->word = $word;
		$content = $advertise->searchListAdvertise();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new AdvertiseAR();
		$category_model = new CategoryAR();
		$category = $category_model->findAllListCategory();
		if (app()->request->getPost('AdvertiseAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('AdvertiseAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());

			if($model->validate())
			{
				$imageUploadFile = CUploadedFile::getInstance($model, 'image');
				if($imageUploadFile !== null){ // only do if file is really uploaded
					$imageFileName = time().$imageUploadFile->name;
					$model->image = $imageFileName;
				}
				if($model->save()){
					if($imageUploadFile !== null) // validate to save file
					{
						$pathImage = dirname(dirname(app()->basePath)) . app()->params['imagePath'].$imageFileName;
						$imageUploadFile->saveAs($pathImage);
						// resize
						if($data['cat_id'] != 'logo')
							$this->resizeImage($pathImage, $data['cat_id']);
					}
					user()->setFlash('messages', 'Add successful!!');
				}

			}
		}
		$this->render('add', compact('model', 'category'));
	}

	public function actionEdit($id)
	{
		$advertise = new AdvertiseAR();
		$model = $advertise->findByPk($id);
		$category_model = new CategoryAR();
		$category = $category_model->findAllListCategory();
		if(!$model)
			return ;
		if (app()->request->getPost('AdvertiseAR'))
		{
			$data = request()->getPost('AdvertiseAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
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
					$pathImage = dirname(dirname(app()->basePath)) . app()->params['imagePath'].$imageFileName;
					$ret = $imageUploadFile->saveAs($pathImage);
					// resize
					if($data['cat_id'] != 'logo')
						$this->resizeImage($pathImage, $data['cat_id']);
					if($ret)
						deleteImage(dirname(dirname(app()->basePath)) . app()->params['imagePath'], $image_old);
				}

				if($model->save())
					user()->setFlash('messages', 'Edit successful!!');
			}
		}
		$this->render('edit', compact('model', 'category'));
	}
	public function actionDelete($id)
	{
		$model = AdvertiseAR::model()->findByPk($id);
		if($model->delete())
			deleteImage(dirname(dirname(app()->basePath)) . app()->params['imagePath'], $model->image);
	}

	private function resizeImage($pathImage, $cat_id){
		if(is_file($pathImage)){
			// *** 1) Initialise / load image
			$resizeObj = new Resize($pathImage);
			$type = 'exact';
			if($cat_id == 'gioithieu'){
				$w = 274; $h = 257; $type = 'landscape';
			}else if($cat_id == 'logo'){
				$w = 200; $h = 102;
			}else if($cat_id == 1){
				$w = 1200; $h = 360;
			}


			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj -> resizeImage($w, $h, $type);

			// *** 3) Save image
			$resizeObj -> saveImage($pathImage, 100);
		}
	}

	private function createThumbs($pathImage, $thumbPath){
		// *** 1) Initialise / load image
		$resizeObj = new Resize($pathImage);

		// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
		$resizeObj -> resizeImage(40, 40, 'exact');

		// *** 3) Save image
		$resizeObj -> saveImage($thumbPath, 100);
	}
}