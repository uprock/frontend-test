<?php

Yii::import('common.models._base.BaseBlogComment');

class BlogComment extends BaseBlogComment {
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
				'updateAttribute' => NULL,
			),
		);
	}

	public function listData()
	{
		$data = $this->fields(array('id', 'blog_id', 'name', 'comment'));

		return $data;
	}

	public function viewData()
	{
		$data = $this->fields(array('id', 'title', 'create_time', 'content'));

		return $data;
	}

}