<?php

class BaseAR extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function switchSlave()
	{
		if(Yii::app()->params['db_enable_slave']) self::$db=Yii::app()->db_slave;
	}

	public function switchMaster()
	{
		self::$db=Yii::app()->getDb();
	}

	
	protected function beforeFind()
	{
		if(Yii::app()->params['db_enable_slave']) $this->switchSlave();
		return true;
	}

	protected function afterFind()
	{
		if(Yii::app()->params['db_enable_slave']) $this->switchMaster();
		return true;
	}

	/**
	 * 一覧のsearch
	 * 
	 * @param CDbCriteria $criteria CDbCriteria
	 * @param integer $pageSize 1ページの表示件数。-1の時には、全件表示。
	 * @param integer $maxPage 最大ページ数。-1の時には、制限無し。
	 * @return CActiveDataProvider
	 */
	protected function searchList_Ex($criteria, $pageSize = -1, $maxPage = -1)
	{
		$config = array();

		$config['criteria'] = $criteria;

		if ($pageSize >= 0)
		{
			$config['pagination'] = array('pageSize'=>$pageSize, 'pageVar'=>'page');
		}
		else
		{
			$config['pagination'] = false;
		}

		if ($pageSize > 0 && $maxPage > 0)
		{
			$config['totalItemCount'] = $pageSize * $maxPage;
		}

		$ret = new CActiveDataProvider($this, $config);


		// totalItemCountは、再計算が必要
		if (isset($config['totalItemCount']))
		{
			// trueを引数にして、refreshをし、実際の件数を取得する
			$totalItemCount = $ret->getTotalItemCount(true);

			// 実際の件数 >= 設定した件数
			if ($totalItemCount >= $config['totalItemCount'])
			{
				// 設定した件数に戻し、表示される件数を制限する
				$ret->setTotalItemCount($config['totalItemCount']);
			}
		}

		return $ret;
	}

}