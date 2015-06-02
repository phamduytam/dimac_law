<?php
class ReservationController extends Controller{
	public function actionIndex(){
		$model = new ReservationAR();

		//terms & condition
		$temp = new ConditionAR();
		$temp->status = 1;
		$temp->lang = $this->langtype;
		$condition = $temp->getList();

		//hour
		$id = 5;
		if($this->langtype == 'en')
			$id = 9;
		else if($this->langtype == 'cn')
			$id = 13;
		$temp = new StaticAR();
		$temp->status = 1;
		$hour = $temp->findByPk($id);

		//hour
		$temp = new StaticAR();
		$id_h = 6;
		if($this->langtype == 'en')
			$id_h = 10;
		else if($this->langtype == 'cn')
			$id_h = 14;
		$phone = $temp->findByPk($id_h);

		$this->render('index', compact('model', 'condition', 'hour', 'phone'));
	}

	public function actionBooking(){
		if(request()->getPost('ReservationAR')){
			$model = new ReservationAR();
			$data = request()->getPost('ReservationAR');
			$model->attributes = $data;
			$model->checkIn = date('Y-m-d H:i:s', strtotime($data['checkIn']));
			$model->checkOut = date('Y-m-d H:i:s', strtotime($data['checkOut']));
			$model->status = 1;
			if($model->validate())
				if($model->save())
					return true;
			return false;
		}
	}
}