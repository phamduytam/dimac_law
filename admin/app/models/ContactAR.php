<?php
class ContactAR extends BaseAR
{
	public $word;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminAR the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			/*
			※後で使用できそうなので、元のコードをコメントして、残しておきます。
			array('user_id, password, name', 'required'),
			array('permission, status', 'numerical', 'integerOnly'=>true),
			array('user_id, password', 'length', 'max'=>64),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, password, name, permission, status', 'safe', 'on'=>'search'),
			*/
			array('name, subject, content', 'required', 'message' => 'Vui lòng nhập {attribute} '),
			array('email', 'email', 'message' => 'Email không hợp lệ '),
			array('created, status', 'safe')
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name'			=> 'Họ tên',
			'subject'		=> 'Tiêu đề',
			'content'		=> 'Nội dung',
			'status'		=> 'Tình trạng',
			'created'		=> 'Ngày tạo',
			'email'			=> 'Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		/*
		※後で使用できそうなので、元のコードをコメントして、残しておきます。
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('permission',$this->permission);
		$criteria->compare('status',$this->status);
		*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	private function getCriteriaListContact()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		//$criteria->addCondition('status = :status')->params[':status'] = 1;
		if(strlen($this->word) > 0){
			$criteria->compare('subject', $this->word, true, 'OR');
			$criteria->compare('content', $this->word, true, 'OR');
			$criteria->compare('name', $this->word, true, 'OR');
			$criteria->compare('email', $this->word, true, 'OR');
		}
		$criteria->order = 'id DESC';
		return $criteria;
	}

	public function searchListContact($pageSize = 20, $maxPage = -1)
	{
		$criteria = $this->getCriteriaListContact();
		return $this->searchList_Ex($criteria, $pageSize, $maxPage);
	}

	public function messageUnRead(){
		$criteria = new CDbCriteria();
		$criteria->addCondition("status = :status")->params[':status'] = 1;
		$criteria->order = 'id DESC';
		$criteria->limit = 3;
		return $this->findAll($criteria);
	}
	/**
	 *
	 * count message status = 1;
	 */
	public function countAllUnRead()
	{
		$criteria = new CDbCriteria();
		$criteria->addCondition("status = :status")->params[':status'] = 1;
		$data = $this->findAll($criteria);
		return count($data);
	}
}