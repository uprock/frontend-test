<?php
return array(
/*    'urlManager' => array(
        'showScriptName' => false,
        'urlFormat' => 'path',
        'rules' => array(
            'admin' => 'articles',
            'admin/<action:[\w\.]+>' => '<action>',
            'admin/<controller:\w+>/<action:[\w\.]+>' => '<controller>/<action>',
            'admin/<controller:\w+>/<action:[\w\.]+>/<id:\d+>' => '<controller>/<action>',
            'admin/<module:\w+>/<controller:\w+>/<action:[\w\.]+>' => '<module>/<controller>/<action>',
        ),
    ),*/
    /*    'cache' => array(
            'class' => 'system.caching.CDbCache',
            'connectionID' => 'db'
        ),*/
	'log'=>array(
		'class'=>'CLogRouter',
		'routes'=>array(
			array(
				'class'=>'CFileLogRoute',
				'levels'=>'error, warning',
			),
			array(
				'class'=>'CEmailLogRoute',
				'levels'=>'error, warning',
				'emails'=>'cezar62882@gmail.com',
			),
		),
	),
    'debug' => array(
        'class' => 'common.extensions.yii2-debug-master.Yii2Debug', // composer installation
        'allowedIPs' => array(
            '127.0.0.1',
        ),
        //'class' => 'ext.yii2-debug.Yii2Debug', // manual installation
    ),
    'db' => require Yii::getPathOfAlias('common.config') . DIRECTORY_SEPARATOR . 'db.php',

    'user' => array(
        'class' => 'common.components.WebUser',
        'allowAutoLogin' => true,
        'loginUrl' => array('auth/login'),
    ),

    'session' => array(
        'class' => 'CDbHttpSession',
        'connectionID' => 'db',
        'autoCreateSessionTable' => true,
        'timeout' => 86400,
    ),
    'authManager' => array(
        'class' => 'PhpAuthManager',
        'defaultRoles' => array('guest'),
    ),

    'clientScript' => array(
        'scriptMap' => array(
            'jquery.js' => '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js',
            'jquery.min.js' => '//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js',
            'jquery-ui.min.js' => '//ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js',
        ),
    ),
);