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
				{
					// send mail
					try {
						$content = '';
						$mail = Yii::createComponent('application.components.phpmailer.JPhpMailer');
						$mail->IsSMTP();
						$mail->Host = 'smtp.googlemail.com';
						$mail->Port = '465';
						$mail->SMTPSecure = "ssl";
						$mail->SMTPAuth = true;
						$mail->SMTPKeepAlive = true;
						$mail->Mailer = "smtp";
						$mail->CharSet = 'utf-8';
						$mail->SMTPDebug  = 0;
						$mail->Username = 'DimacLaw.Info@gmail.com';
						$mail->Password = '';
						$mail->SetFrom($model->email, $model->name);
						$content .= '<p>Họ tên: ' . $model->name . ' </p>';
						$content .= '<p>Email: '. $model->email .'</p>';
						$content .= '<p>Điện thoại: '. $model->phone.'</p>';
						$content .= '<p>Nội dung: <br></p>';
						$content .= nl2br($model->content);

						$mail->Subject = '[SEND MAIL FROM WEBSITE] ' . $model->subject;
						$mail->AltBody = '';
						$mail->MsgHTML($content);
						$mail->AddAddress('ls.quoctuan@gmail.com', 'Pham Quoc Tuan');
						$mail->Send();

					} catch (phpmailerException $e) {
						echo $e->errorMessage(); //Pretty error messages from PHPMailer
					} catch (Exception $e) {
						echo $e->getMessage(); //Boring error messages from anything else!
					}

					user()->setFlash('messages', 'Send successful!!');
				}
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
