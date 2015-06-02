<?php
class GalleryController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$gallery = new GalleryAR("searchList");
		if($word) $gallery->word = $word;
		$gallery->lang = $this->langtype;
		$content = $gallery->searchList();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new GalleryAR();
		$langId = $model->getList();
		if (app()->request->getPost('GalleryAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('GalleryAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->lang = $this->langtype;
			if($model->validate())
			{
				if($this->langtype == 'vn'){
					$imageUploadFile = CUploadedFile::getInstances($model, 'image');

					if($imageUploadFile !== null){ // only do if file is really uploaded
						foreach ($imageUploadFile as $value){
							$imageFileName = time().$value->name;
							$pathImage = dirname(dirname(app()->basePath)) . app()->params['imagePath'].$imageFileName;
							$value->saveAs($pathImage);
							// resize
							$this->resizeImage($pathImage);
							$thumsPath = dirname(dirname(app()->basePath)) . app()->params['imagePath'] . 'thumbs/' .$imageFileName;
							$this->createThumbs($pathImage, $thumsPath);
							$image[] = $imageFileName;
						}

					}
					$model->image = json_encode($image);
				}
				else{
					$image = $model->findByPk($data['langId']);
					$model->image = $image->image;
				}
				if($model->save()){
					user()->setFlash('messages', 'Add successful!!');
				}

			}
		}
		$_view = 'add';
		if($this->langtype !='vn')
			$_view = '_add';
		$this->render($_view, compact('model', 'langId'));
	}

	public function actionEdit($id)
	{
		$gallery = new GalleryAR();
		$model = $gallery->findByPk($id);
		$langId = $model->getList();
		if(!$model)
			return ;
		if (app()->request->getPost('GalleryAR'))
		{
			$data = request()->getPost('GalleryAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());
			$model->image = $_POST['hd_img'];
			$model->lang = $this->langtype;
			if($model->validate())
			{
				if($this->langtype == 'vn'){
					$imageUploadFile = CUploadedFile::getInstances($model, 'image');
					if($imageUploadFile != null) // validate to save file
					{
						foreach ($imageUploadFile as $value){
							$imageFileName = time().$value->name;
							$pathImage = dirname(dirname(app()->basePath)) . app()->params['imagePath'].$imageFileName;
							$ret = $value->saveAs($pathImage);
							// resize
							$this->resizeImage($pathImage);
							// create Thumbs
							$thumsPath = dirname(dirname(app()->basePath)) . app()->params['imagePath'] . 'thumbs/' .$imageFileName;
							$this->createThumbs($pathImage, $thumsPath);
							$image2[] = $imageFileName;
						}
						$image1 = json_decode($_POST['hd_img']);
						$image = array_merge($image1, $image2);
						$model->image = json_encode($image);
					}
				}

				if($model->save())
					user()->setFlash('messages', 'Edit successful!!');
			}
		}
		$model->image = json_decode($model->image);
		$_view = 'edit';
		if($this->langtype !='vn')
			$_view = '_edit';
		$this->render($_view, compact('model', 'langId'));
	}
	public function actionDelete($id)
	{
		$model = GalleryAR::model()->findByPk($id);
		$image = json_decode($model->image);
		if($model->delete())
		{
			if($this->langtype == 'vn'){
				foreach ($image as $value){
					deleteImage(dirname(dirname(app()->basePath)) . app()->params['imagePath'], $value);
				}
			}
		}
	}

	private function resizeImage($pathImage){
		if(is_file($pathImage)){
			// *** 1) Initialise / load image
			$resizeObj = new Resize($pathImage);
			$type = 'exact';
			$w = 1160; $h = 840;

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
		$resizeObj -> resizeImage(290, 210, 'exact');

		// *** 3) Save image
		$resizeObj -> saveImage($thumbPath, 100);
	}
	// delete 1 image in album
	public function actionDeleteImage(){
		$value = $_POST['imageDel'];
		$array = json_decode($_POST['arrImage']);
		if(($key = array_search($value, $array)) !== false){
			unset($array[$key]);
			deleteImage(dirname(dirname(app()->basePath)) . app()->params['imagePath'], $value);
		}
		sort($array);
		echo json_encode($array);
	}
}