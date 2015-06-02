<?php
class ProductController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$product = new ProductAR("searchListProduct");
		if($word) $product->word = $word;
		$content = $product->searchListProduct();
		$this->render('index', compact('content', 'word'));
	}

	public function actionAdd()
	{
		$model = new ProductAR();
		if (app()->request->getPost('ProductAR'))
		{
			// POSTデータの取得
			$data = request()->getPost('ProductAR');
			$model->attributes = $data;
			$model->alias = convert($data['name']);
			$model->created = date('Y-m-d H:i:s', time());

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
		$this->render('add', compact('model'));
	}

	public function actionEdit($id)
	{
		$product = new ProductAR();
		$model = $product->findByPk($id);
		if(!$model)
			return ;
		if (app()->request->getPost('ProductAR'))
		{
			$data = request()->getPost('ProductAR');
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
		$this->render('edit', compact('model'));
	}
	public function actionDelete($id)
	{
		$model = ProductAR::model()->findByPk($id);
		if($model->delete())
			deleteImage(dirname(dirname(app()->basePath)) . '/public_html/uploads/', $model->image);
	}
}