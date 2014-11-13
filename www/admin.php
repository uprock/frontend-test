<?php
date_default_timezone_set('Europe/Moscow');
$yii = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'framework/yiilite.php';
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
defined('YII_DEBUG_SHOW_PROFILER') or define('YII_DEBUG_SHOW_PROFILER', false);
defined('YII_DEBUG_PROFILING') or define('YII_DEBUG_PROFILING', false);
defined('YII_DEBUG_DISPLAY_TIME') or define('YII_DEBUG_DISPLAY_TIME', false);

require_once($yii);

//require_once dirname(__FILE__).'/../vendor/autoload.php';


$config = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'apps/admin/config/main.php';

Yii::setPathOfAlias('common', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('vendor', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor');
Yii::setPathOfAlias('application',	dirname(__FILE__) . DIRECTORY_SEPARATOR );

Yii::createWebApplication($config)->run();