<?php

class PostController extends RESTController
{
	public function actionList()
	{
		$limit = 9;
		$offset = 0;

		if(isset($_GET['limit']))
		{
			$limit = $_GET['limit'];
		}
		if(isset($_GET['page']))
		{
			$page = intval($_GET['page']);
			$offset = ($page - 1) * $limit;
		}

		$rows = array();

		$criteria = new CDbCriteria;
		$criteria->select = 't.*';
		$criteria->order = '`create_time` desc';
		$criteria->limit = $limit;
		$criteria->offset = $offset;
		$total_items = Blog::model()->count($criteria);
		$models = Blog::model()->findAll($criteria);

		foreach ($models as $model)
		{
			$rows[] = $model->listData();
		}

		$page_size = $limit;
		$pages_count = ceil($total_items / $page_size);
		$current_page = floor($offset / $limit) + 1;
		if(count($rows) === 0)
		{
			$this->_sendResponse(404, 'Ничего не найдено');
		}

		$this->_sendResponse(200, CJSON::encode(array(
		                                             'elements' => $rows,
		                                             'page' => array(
			                                             'current' => $current_page,
			                                             'total' => $pages_count,
			                                             'totalCount' => $total_items,
			                                             'page_size' => $page_size
		                                             ),
		                                        )));
	}

	public function actionView()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$model = Blog::model()->findByPk($id);
			if ($model !== NULL) {
				$element = $model->viewData();
				$this->_sendResponse(200, CJSON::encode(array('element' => $element)));

			} else {
				$this->_sendResponse(404, 'No Item found with id ' . $_GET['id']);
			}
		} else {
			$this->_sendResponse(400, CJSON::encode(array('errors' => array('Error: Parameter <b>id</b> is missing'))));
		}
	}

	public function actionCreate()
	{

		$model = new Blog();
		$model->setAttributes($_POST);

		$img = CUploadedFile::getInstanceByName('img');

		if($img instanceof CUploadedFile) {
			$model->img = md5(time());
			$img->saveAs($model->imgPath.$model->img);
		}

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
