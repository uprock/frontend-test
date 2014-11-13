<?php

Yii::setPathOfAlias('editable', Yii::getPathOfAlias('common') . DIRECTORY_SEPARATOR . 'extensions/x-editable');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'admin',
    'preload' => array('debug'),
    'language' => 'ru',
    'extensionPath' => Yii::getPathOfAlias('common') . DIRECTORY_SEPARATOR . 'extensions',
    'defaultController' => 'articles',

    'import' => array(
        'common.components.*',
        'common.models.*',
        'application.components.*',
        'application.models.*',
        'ext.giix-components.*',
        'ext.sortable.behaviors.*',
    ),

    'modules' => require 'modules.php',
    'components' => require 'components.php',
    'params' => require 'params.php',
);
