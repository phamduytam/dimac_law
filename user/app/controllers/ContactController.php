<?php
class ContactController extends Controller
{
	public function actionIndex()
	{
		$model = new ContactAR();
		if(request()->getPost('ContactAR')){
			$model->attributes = request()->getPost('ContactAR');
			$model->created = date('Y-m-d H:i:s', time());
			$model->status = 1;
			if($model->validate()){
				if($model->save())
					user()->setFlash('messages', 'Send successful!!');
			}
		}
		$tmp_model = new StaticAR();
		// address
		$id = 1;
		if($this->langtype == 'en')
			$id = 7;
		$address = $tmp_model->findByPk($id);

		//descripiton contact
		$id = 18;
		if($this->langtype == 'en')
			$id = 19;
		$contact = $tmp_model->findByPk($id);
		$this->render('index', compact('model', 'contact', 'address'));
	}
}