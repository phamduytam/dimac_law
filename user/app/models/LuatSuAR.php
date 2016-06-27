<?php
class LuatSuAR extends BaseAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminAR the static model class
	 */
	public $word;
	public $lang;
	public $linhvuc_id;
	public $chucdanh_id;
	public $vanphong_id;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'luatsu';
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
			array('alias', 'required'),
			array('name', 'required', 'message' => 'Vui lòng nhập tên luật sư'),
			array('content', 'required', 'message' => 'Vui lòng nhập nội dung'),
			array('image', 'file', 'allowEmpty'=>true, 'types' => 'jpg, gif, png, jpeg', 'maxSize' => 2048*1000, 'wrongType' => 'Image không đúng định dạng ', 'tooLarge' => 'Image quá lớn'),
			array('ordering, email, phone, address, linhvuc_id, chucdanh_id, vanphong_id, created, lang', 'safe')
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
			'linhvuc'=>array(self::BELONGS_TO, 'BaiVietAR', 'linhvuc_id'),
			'vanphong'=>array(self::BELONGS_TO, 'BaiVietAR', 'vanphong_id'),
			'chucdanh'=>array(self::BELONGS_TO, 'ChucDanhAR', 'chucdanh_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'name'			=> 'Tên luật sư',
			'alias'			=> 'Alias',
			'email'			=> 'Email',
			'content'		=> 'Nội dung',
			'image'			=> 'Hình ảnh',
			'ordering'		=> 'Thứ tự',
			'address'		=> 'Địa chỉ',
			'phone'			=> 'Số điện thoại',
			'linhvuc_id'	=> 'Lĩnh vực hành nghề',
			'chucdanh_id'	=> 'Chức danh',
			'vanphong_id'	=> 'Văn phòng',
			'created'		=> 'Ngày tạo',
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

	private function getCriteriaList()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		//$criteria->addCondition('status = :status')->params[':status'] = 1;
		if(strlen($this->word) > 0)
			$criteria->compare('t.name',$this->word,true);

		if(strlen($this->lang) > 0){
			$criteria->addCondition('t.lang = :lang')->params[':lang'] = $this->lang;
		}

		if(strlen($this->linhvuc_id) > 0){
			//$criteria->addCondition('t.linhvuc_id = :linhvuc_id')->params[':linhvuc_id'] = $this->linhvuc_id;
			$criteria->addCondition('FIND_IN_SET(:linhvuc_id, t.linhvuc_id) > 0')->params[':linhvuc_id'] = $this->linhvuc_id;
		}

		if(strlen($this->vanphong_id) > 0){
			$criteria->addCondition('t.vanphong_id = :vanphong_id')->params[':vanphong_id'] = $this->vanphong_id;
		}

		if(strlen($this->chucdanh_id) > 0){
			$criteria->addCondition('t.chucdanh_id = :chucdanh_id')->params[':chucdanh_id'] = $this->chucdanh_id;
		}

		$criteria->with = array(
			'linhvuc' => array(
				'select' 	=> 'linhvuc.name',
				'joinType'	=> 'LEFT JOIN',
				'on'		=> 'linhvuc.cat_id = 4 and linhvuc.parent_id = 0'
			),
			'vanphong' => array(
				'select' 	=> 'vanphong.name',
				'joinType'	=> 'LEFT JOIN',
				'on'		=> 'vanphong.cat_id = 2 and vanphong.parent_id = 0'
			),
			'chucdanh' => array(
				'select' 	=> 'chucdanh.name',
				'joinType'	=> 'LEFT JOIN',
			),
		);

		$criteria->order = 't.id DESC';
		return $criteria;
	}

	public function searchList($pageSize = 20, $maxPage = -1)
	{
		$criteria = $this->getCriteriaList();
		return $this->searchList_Ex($criteria, $pageSize, $maxPage);
	}
}