<?php
class LuatsuController extends Controller
{
	public function actionIndex()
	{
		$model = new LuatSuAR();
		$content = '';
		$get_name = request()->getQuery('name', '');
		$get_linhvuc = request()->getQuery('linhvuc', 0);
		$get_vanphong = request()->getQuery('vanphong', 0);
		$get_chucdanh = request()->getQuery('chucdanh', 0);


		if($get_name) $model->word = $get_name;
		if($get_linhvuc) $model->linhvuc_id = $get_linhvuc;
		if($get_vanphong) $model->vanphong_id = $get_vanphong;
		if($get_chucdanh) $model->chucdanh_id = $get_chucdanh;
		$model->lang = $this->langtype;

		if($get_chucdanh != 0 || $get_vanphong != 0 || $get_name != '' || $get_linhvuc != 0)
			$content = $model->searchList();

		$tmp_model = new StaticAR();
		// address
		$id = 1;
		if($this->langtype == 'en')
			$id = 7;
		$address = $tmp_model->findByPk($id);

		//descripiton contact
		$id = 30;
		if($this->langtype == 'en')
			$id = 31;
		$luatsu = $tmp_model->findByPk($id);

		// linh vuc
		$tmp = new BaiVietAR("getMenu");
		$tmp->cat_id = 4;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$linhvuc = $tmp->getMenu();

		// vanphong
		$tmp = new BaiVietAR("getMenu");
		$tmp->cat_id = 2;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$vanphong = $tmp->getMenu();

		// chucdanh
		$tmp = new ChucDanhAR("findAllList");
		$tmp->lang = $this->langtype;
		$chucdanh = $tmp->findAllList();

		$this->render('index', compact(
			'content', 'luatsu', 'linhvuc', 'vanphong', 'chucdanh', 'get_name', 'get_linhvuc', 'get_vanphong', 'get_chucdanh'));
	}

	/**
	 * detail luatsu
	 */
	public function actionDetail($id, $alias) {
		// content luatsu
		$model = new LuatSuAR();
		$content = $model->findByPk($id);

		//descripiton luatsu
		$tmp_model = new StaticAR();
		$id = 30; //18
		if($this->langtype == 'en')
			$id = 31; //19
		$luatsu = $tmp_model->findByPk($id);

		// linh vuc
		$tmp = new BaiVietAR("getMenu");
		$tmp->cat_id = 4;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$linhvuc = $tmp->getMenu();

		// vanphong
		$tmp = new BaiVietAR("getMenu");
		$tmp->cat_id = 2;
		$tmp->parent_id = 0;
		$tmp->lang = $this->langtype;
		$vanphong = $tmp->getMenu();

		// chucdanh
		$tmp = new ChucDanhAR("findAllList");
		$tmp->lang = $this->langtype;
		$chucdanh = $tmp->findAllList();

		$this->render('detail', compact('content', 'luatsu', 'linhvuc', 'vanphong', 'chucdanh'));
	}
}