<?php
class ProductController extends Controller
{
	public function actionIndex()
	{
		$word = request()->getQuery('word', '');
		$product = new ProductAR("searchListProduct");
		if($word) $product->word = $word;
		$product->status = 1;
		$content = $product->searchListProduct(15);
		$this->render('index', compact('content', 'word'));
	}

	public function actionDetail($id, $alias)
	{
		$model = new ProductAR();
		$product = $model->findByPk($id);
		if(!$product)
			return ;
		$model->id = $id;
		$ortherList = $model->getListOrther(10);
		$this->render('detail', compact('product', 'ortherList'));
	}

}