<?php
class TintucController extends Controller
{
	public function actionIndex($alias='')
	{
		$alias = htmlentities($alias);
		// category gioithieu

		$model = new TinTucAR();
		$model->lang = $this->langtype;
		$model->parent_id = 0;
		$category = $model->getMenu();

		$model = new TinTucAR();
		if($alias) {
			$alias = str_replace('.html', '', $alias);
			$parent = $model->findByAttributes(array('alias' => $alias, 'lang' => $this->langtype));
		} else {
			$id = $category[0]->id;
			$parent = $model->findByPk($id);
		}

		if (!$parent) {
			$this->error('Page not found', '404');
			return ;
		}

		$model = new TinTucAR('searchList');
		$model->parent_id = $parent->id;
		$model->lang = $this->langtype;
		$model->order = 't.created DESC';
		$content = $model->searchList();

		$this->render('index', compact('content', 'category', 'parent'));
	}

	public function actionView($alias){

		//category
		$model = new TinTucAR();
		$model->lang = $this->langtype;
		$model->parent_id = 0;
		$category = $model->getMenu();

		$model = new TinTucAR();
		if($alias) {
			$alias = str_replace('.html', '', $alias);
			$content = $model->findByAttributes(array('alias' => $alias, 'lang' => $this->langtype));
		}
		if (!$content) {
			$this->error('Page not found', '404');
			return ;
		}

		//other
		$model->id = $content->id;
		$model->lang = $this->langtype;
		$other = $model->getOther(5);
		$this->render('view', compact('content', 'other', 'category'));
	}
}