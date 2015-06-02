<?php

class CommonNodeTest extends CommonNodeTestHTML
{

	/**
	 * s_spacer
	 *
	 * @return CommonNodeTestHTML
	 */
	static public function getNodeSSpacer()
	{
		return new CommonNodeTestHTML(array(
			'attr' => array(
				'class' => 's_spacer',
			),
		));
	}

	/**
	 * m_spacer
	 * 'class' => 'm_spacer',
	 *
	 * @return CommonNodeTestHTML
	 */
	static public function getNodeMSpacer()
	{
		return new CommonNodeTestHTML(array(
			'attr' => array(
				'class' => 'm_spacer',
			),
		));
	}

	/**
	 * main_img
	 * 'class' => 'row-fluid', 'align' => 'center'
	 *
	 * @return CommonNodeTestHTML
	 */
	static public function getNodeMainImage()
	{
		return new CommonNodeTestHTML(array(
			'attr' => array(
				'class' => 'row-fluid', 
				'align' => 'center'
			),
		));
	}

	/**
	 * 'class' => 'row-fluid'
	 *
	 * @return CommonNodeTest
	 */
	static public function getNodeMainRowFluid()
	{
		return new CommonNodeTest(array(
			'attr' => array(
				'class' => 'row-fluid',
			),
		));
	}

}
