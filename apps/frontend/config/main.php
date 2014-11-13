<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Frontend',
	'preload'=>array('log'),
    //'preload'=>(strpos($_SERVER['REQUEST_URI'], '/api/') !== false ? array('auth') : array()),
    'language' => 'ru',
    'extensionPath' => Yii::getPathOfAlias('common') . DIRECTORY_SEPARATOR . 'extensions',
    'defaultController' => 'main',
    'import' => array(
        'common.components.*',
        'common.models.*',
        'application.components.*',
        'application.models.*',
        'ext.giix-components.*',
    ),
    'modules' => require 'modules.php',
    'components' => require 'components.php',
    'params' => require 'params.php',
);
