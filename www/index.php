<?php

date_default_timezone_set('Europe/Moscow');
$yii = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'framework/yii.php';
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
defined('YII_DEBUG_SHOW_PROFILER') or define('YII_DEBUG_SHOW_PROFILER', true);
defined('YII_DEBUG_PROFILING') or define('YII_DEBUG_PROFILING', true);
defined('YII_DEBUG_DISPLAY_TIME') or define('YII_DEBUG_DISPLAY_TIME', true);
require_once($yii);

//require_once dirname(__FILE__).'/../vendor/autoload.php';

$config = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'apps/frontend/config/main.php';
Yii::setPathOfAlias('common', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'common');
Yii::setPathOfAlias('vendor', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor');
Yii::createWebApplication($config)->run();