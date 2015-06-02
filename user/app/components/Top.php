<?php

class Top
{
	public static $category_id = '';

	/*
	 * Get master contents of monthly package
	 *
	 * @param integer $num the quantity of items
	 */
	private static function getMContentMPack($num = NULL, $order = DigitalOadMContentAR::TYPE_ORDER_NEW){
		$tmp = new DigitalOadMContentAR('searchListMpackContent');
		$tmp->category_id = self::$category_id;
		$tmp->mpack_id = Controller::MPACK_ID;
		$tmp->type_order = $order;
		return $tmp->searchListMpackContent($num);
	}

	/**
	 * Set Content of Top page with Ero Category
	 *
	 */
	public static function setContentEro()
	{
		// Get level access of user
		$isGuest = user()->getIsGuest();
		$isFullAccess = user()->isFullAccessDevice();
		$isTablet = user()->isTablet();

		// Check whether or not user register montly package
		$regist = DigitalOadTMpackRegistAR::checkRegist();

		// TopMain_01
		$topMain_01 = DigitalOadMTopMainAR::model()->getList(Controller::CATEGORY_ERO, 4);

		$ctview = new DigitalOadTContentViewAR();
		$contentView = $ctview->searchListContentView(4);

		// 月額パック コンテンツ
		$top_mpack = self::getMContentMPack(6);

		// TopMain_02
		$topMain_02 = DigitalOadMTopMainAR::model()->getList(Controller::CATEGORY_ERO, 2, 4);

		return compact('isGuest', 'isFullAccess', 'isTablet', 'regist',
					'topMain_01', 'contentView', 'top_mpack', 'topMain_02');
	}
}
