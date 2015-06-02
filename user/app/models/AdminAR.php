<?php
/**
 * This is the model class for table "admin_t_user".
 *
 * The followings are the available columns in table 'admin_t_user':
 * @property string $user_id
 * @property string $password
 * @property string $name
 * @property integer $permission
 * @property integer $status
 */
class AdminAR extends BaseAR
{
	public $old_password;
	public $new_password;
	private $_user;


	//----------------------------------------
	// デフォルト 属性
	//----------------------------------------



	//----------------------------------------
	// 追加 属性
	//----------------------------------------



	//--------------------------------------------------------------------------
	// デフォルト 関数
	//--------------------------------------------------------------------------


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin';
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
			array('username, password', 'required', 'on'=>'login'),
			array('name', 'required', 'message' => '{attribute} không được rỗng ', 'on' => 'profile'),
			array('old_password', 'compareOldPassword', 'on' => 'changePassword'),
			array('new_password', 'required', 'message' => '{attribute} không được rỗng ', 'on' => 'changePassword')
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
			'username'		=> 'Username',
			'password'		=> 'Password',
			'name'			=> 'Name',
			'status'		=> 'Status',
			'old_password'	=> 'Old Password',
			'new_password'	=> 'New Password'
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

	public function compareOldPassword($attribute)
	{
		$this->_user = $this->findByPk(user()->getId());
		if(md5($this->old_password) !== $this->_user->password)
		{
			$this->addError($attribute, 'Old Password không đúng ');
		}
	}

	public function beforeSave()
	{
		if(strlen($this->new_password) > 0)
			$this->password = md5($this->new_password);
		return true;
	}

}
