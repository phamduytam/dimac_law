<?php
class RoomController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$model = new RoomAR("searchList");
		if($word) $model->word = $word;
		$model->lang = $this->langtype;
		$content = $model->searchList();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new RoomAR();
		if (app()->request->getPost('RoomAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('RoomAR');
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
					{
						$pathImage = dirname(dirname(app()->basePath)) . app()->params['imagePath'].$imageFileName;
						$imageUploadFile->saveAs($pathImage);
						// resize
						$this->resizeImage($pathImage);
						$thumsPath = dirname(dirname(app()->basePath)) . app()->params['imagePath'] . 'thumbs/' .$imageFileName;
						$this->createThumbs($pathImage, $thumsPath);
					}
					user()->setFlash('messages', 'Add successful!!');
				}

			}
		}
		$this->render('add', compact('model'));
	}

	public function actionEdit($id)
	{
		$room = new RoomAR();
		$model = $room->findByPk($id);
		if(!$model)
			return ;
		if (app()->request->getPost('RoomAR'))
		{
			$data = request()->getPost('RoomAR');
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
					$pathImage = dirname(dirname(app()->basePath)) . app()->params['imagePath'].$imageFileName;
					$ret = $imageUploadFile->saveAs($pathImage);
					//resize
					$this->resizeImage($pathImage);
					$thumsPath = dirname(dirname(app()->basePath)) . app()->params['imagePath'] . 'thumbs/' .$imageFileName;
					$this->createThumbs($pathImage, $thumsPath);
					if($ret)
						deleteImage(dirname(dirname(app()->basePath)) . app()->params['imagePath'], $image_old);
				}

				if($model->save())
					user()->setFlash('messages', 'Edit successful!!');
			}
		}
		$this->render('edit', compact('model'));
	}
	public function actionDelete($id)
	{
		$model = RoomAR::model()->findByPk($id);
		if($model->delete())
			deleteImage(dirname(dirname(app()->basePath)) . app()->params['imagePath'], $model->image);
	}

	private function resizeImage($pathImage){
		if(is_file($pathImage)){
			$w = 530; $h = 240;
			// *** 1) Initialise / load image
			$resizeObj = new Resize($pathImage);

			// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			$resizeObj -> resizeImage($w, $h, 'exact');

			// *** 3) Save image
			$resizeObj -> saveImage($pathImage, 100);
		}
	}

	private function createThumbs($pathImage, $thumbPath){
		// *** 1) Initialise / load image
		$resizeObj = new Resize($pathImage);

		// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
		$resizeObj -> resizeImage(210, 210, 'exact');

		// *** 3) Save image
		$resizeObj -> saveImage($thumbPath, 100);
	}
}