<?php
class TinTucAR extends BaseAR
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
	public $related;
	public $order;
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tintuc';
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
			array('description, order, status, lang, cat_id, parent_id', 'safe')
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
			'category'=>array(self::BELONGS_TO, 'CategoryAR', 'cat_id'),
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
		$criteria->addCondition('t.status = :status')->params[':status'] = 1;
		if(strlen($this->lang) > 0)
			$criteria->addCondition('t.lang = :lang')->params[':lang'] = $this->lang;
		if(strlen($this->cat_id) > 0)
			$criteria->addCondition('t.cat_id = :cat_id')->params[':cat_id'] = $this->cat_id;
		if(strlen($this->parent_id) > 0)
			$criteria->addCondition('t.parent_id = :parent_id')->params[':parent_id'] = $this->parent_id;
		$criteria->with = array(
			'category' => array(
				'select' 	=> 'category.name, category.alias',
				'joinType'	=> 'LEFT JOIN'
			)
		);
		if(strlen($this->order) > 0) {
			$criteria->order = $this->order;
		} else {
			$criteria->order = 't.ordering ASC';
		}
		return $criteria;
	}

	public function searchList($pageSize = 20, $maxPage = -1)
	{
		$criteria = $this->getCriteriaList();
		return $this->searchList_Ex($criteria, $pageSize, $maxPage);
	}

	public function getOther($limit)
	{
		// 5 item > current id
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->addCondition('t.status = :status')->params[':status'] = 1;
		if(strlen($this->id) > 0)
			$criteria->addCondition('id > :id')->params[':id'] = $this->id;
		if(strlen($this->lang) > 0)
			$criteria->addCondition('lang = :lang')->params[':lang'] = $this->lang;
		$criteria->order = 'id DESC';
		$criteria->limit = $limit;
		$arr1 = $this->findAll($criteria);

		// 5 item < current id
		$criteria1 = new CDbCriteria();
		$criteria1->select = '*';
		$criteria1->addCondition('t.status = :status')->params[':status'] = 1;
		if(strlen($this->id) > 0)
			$criteria1->addCondition('id < :id')->params[':id'] = $this->id;
		if(strlen($this->lang) > 0)
			$criteria1->addCondition('lang = :lang')->params[':lang'] = $this->lang;
		$criteria1->order = 'id DESC';
		$criteria1->limit = $limit;
		$arr2 = $this->findAll($criteria1);

		$arr = array_merge($arr1, $arr2);
		return $arr;
	}

	public function getMenu() {
		$criteria = $this->getCriteriaList();
		return $this->findAll($criteria);
	}

	public function getDichVu() {
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->addCondition('t.status = :status')->params[':status'] = 1;
		$criteria->addCondition('t.selected = :selected')->params[':selected'] = 1;
		if(strlen($this->lang) > 0)
			$criteria->addCondition('t.lang = :lang')->params[':lang'] = $this->lang;
		$criteria->with = array(
				'category' => array(
					'select' 	=> 'category.name, category.alias',
					'joinType'	=> 'LEFT JOIN'
				)
			);
		$criteria->order = 'order_select ASC';
		$criteria->limit = 12;
		return $this->findAll($criteria);
	}

	public function getNew($limit = 4) {
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->addCondition('t.status = :status')->params[':status'] = 1;
		if(strlen($this->lang) > 0)
			$criteria->addCondition('t.lang = :lang')->params[':lang'] = $this->lang;
		$criteria->with = array(
				'category' => array(
					'select' 	=> 'category.name, category.alias',
					'joinType'	=> 'LEFT JOIN'
				)
			);
		$criteria->order = 't.created DESC';
		$criteria->limit = $limit;
		return $this->findAll($criteria);
	}
}