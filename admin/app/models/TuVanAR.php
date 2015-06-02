<?php
class TuVanAR extends BaseAR
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdminAR the static model class
	 */
	public $word;
	public $cat_id;
	public $parent_id;
	public $lang;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tuvan';
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
			array('name, content, alias, created', 'required', 'message' => 'Vui lòng nhập {attribute}'),
			array('image', 'file', 'allowEmpty'=>true, 'types' => 'jpg, gif, png, jpeg', 'maxSize' => 2048*1000, 'wrongType' => 'Image không đúng định dạng ', 'tooLarge' => 'Image quá lớn'),
			array('description, order, status, cat_id, parent_id', 'safe')
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
			'name'			=> 'Tiêu đề',
			'alias'			=> 'Alias',
			'description'	=> 'Mô tả',
			'content'		=> 'Nội dung',
			'image'			=> 'Hình ảnh',
			'order'			=> 'Thứ tự',
			'status'		=> 'Tình trạng',
			'created'		=> 'Ngày tạo',
			'parent_id'		=> 'Danh mục'
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

	private function getCriteriaListTuVan()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		//$criteria->addCondition('status = :status')->params[':status'] = 1;
		if(strlen($this->word) > 0)
			$criteria->compare('name',$this->word,true);
		if(strlen($this->cat_id) > 0)
			$criteria->addCondition('cat_id = :cat_id')->params[':cat_id'] = $this->cat_id;
		if(strlen($this->parent_id) > 0)
			$criteria->addCondition('parent_id = :parent_id')->params[':parent_id'] = $this->parent_id;
		if(strlen($this->lang) > 0)
			$criteria->addCondition('lang = :lang')->params[':lang'] = $this->lang;
		$criteria->order = 'id DESC';
		return $criteria;
	}

	public function searchListTuVan($pageSize = 20, $maxPage = -1)
	{
		$criteria = $this->getCriteriaListTuvan();
		return $this->searchList_Ex($criteria, $pageSize, $maxPage);
	}

	public function get_parent() {
		$criteria = $this->getCriteriaListTuVan();
		return $this->findAll($criteria);
	}
}