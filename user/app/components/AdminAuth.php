<?php
class AdminAuth extends CUserIdentity
{
	private $_id;
	public function authenticate()
	{
		$record = AdminAR::model()->findByPk($this->username);
		if ($record === null)
		{
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		}
		else if ($record->password !== md5($this->password))
		{
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			$this->_id = $record->username;
			$this->setState('name', $record->name);
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}

	public function setId($id)
	{
		$this->_id = $id;
		return true;
	}

}

?>
