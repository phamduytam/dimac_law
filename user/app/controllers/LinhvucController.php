<?php
class LinhvucController extends Controller
{
	public function actionIndex($alias='')
	{
		$alias = htmlentities($alias);

		// category
		$model = new BaiVietAR();
		$model->cat_id = 4;
		$model->lang = $this->langtype;
		$model->parent_id = 0;
		$category = $model->getMenu();

		$model = new BaiVietAR();
		if($alias) {
			$alias = str_replace('.html', '', $alias);
			$content = $model->findByAttributes(array('alias' => $alias, 'lang' => $this->langtype));
		} else {
			// mo dau
			$id = 28;
			if($this->langtype == 'en')
				$id = 29;
			$model = new StaticAR();
			$content = $model->findByPk($id);
		}

		if (!$content) {
			$this->error('Page not found', '404');
			return ;
		}

		$this->render('//gioithieu/index', compact('content', 'category'));
	}
}