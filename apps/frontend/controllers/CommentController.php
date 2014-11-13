<?php

class CommentController extends RESTController {
	public function actionList()
	{
		$rows = array();

		$criteria = new CDbCriteria;
		$criteria->select = 't.*';
		$criteria->order = '`create_time` desc';
		$models = BlogComment::model()->findAll($criteria);
		foreach ($models as $model)
		{
			$rows[] = $model->listData();
		}

		if(count($rows) === 0)
		{
			$this->_sendResponse(404, 'Ничего не найдено');
		}

		$this->_sendResponse(200, CJSON::encode(array('elements' => $rows)));
	}

	public function actionCreate()
	{

		$model = new BlogComment();
		$model->setAttributes($_POST);
		if($model->save())
		{
			$this->_sendResponse(200, CJSON::encode(array('result' => $model->id)));
		}
		else
		{
			$this->_sendResponse(400, CJSON::encode(array('result' => $model->getErrors())));
		}
	}
}