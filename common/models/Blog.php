<?php

Yii::import('common.models._base.BaseBlog');

class Blog extends BaseBlog {

	public $imgPath = 'uploads/blogs/';

	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function behaviors()
	{
		return array(
			'rest' => array(
				'class' => 'RestBehavior',
			),
			'CTimestampBehavior' => array(
				'class' => 'zii.behaviors.CTimestampBehavior',
			),
		);
	}

	public function listData()
	{
		$data = $this->fields(array('id', 'title', 'create_time', 'img'));

		return $data;
	}

	public function viewData()
	{
		$data = $this->fields(array('id', 'title', 'create_time', 'content', 'img'));

		return $data;
	}
}