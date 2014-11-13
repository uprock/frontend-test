<?php
return array(
    'urlManager' => array(
        'showScriptName' => false,
        'urlFormat' => 'path',
        'rules' => array(
            // -- -- -- Урл для апи
            array('<model>/list', 'pattern' => 'api/v1/<model:\w+>', 'verb' => 'GET'),
            array('<model>/view', 'pattern' => 'api/v1/<model:\w+>/<id:[\w-]+>', 'verb' => 'GET'),
            array('<model>/update', 'pattern' => 'api/v1/<model:\w+>/<id:\d+>', 'verb' => 'PUT'),
            array('<model>/delete', 'pattern' => 'api/v1/<model:\w+>/<id:\d+>', 'verb' => 'DELETE'),
            array('<model>/create', 'pattern' => 'api/v1/<model:\w+>', 'verb' => 'POST'),
            // -- -- --
        ),
    ),

    'auth'=> array(
        'class'=>'common.components.BasicAuth',
        'enable' =>strpos($_SERVER['REQUEST_URI'], '/api/') !== false,
    ),

    'cache' => array(
        'class' => 'system.caching.CDbCache',
        'connectionID' => 'db'
    ),

    'db' => require Yii::getPathOfAlias('common.config') . DIRECTORY_SEPARATOR . 'db.php',
/*    'user' => array(
        'class' => 'common.components.WebUser',
        'allowAutoLogin' => true,
        'loginUrl' => array('auth/login'),
    ),*/
    'session' => array(
        'class' => 'CDbHttpSession',
        'connectionID' => 'db',
        'autoCreateSessionTable' => true,
        'timeout' => 86400,
    ),
    'search' => array(
        'class' => 'common.extensions.DGSphinxSearch.DGSphinxSearch',
        'server' => '127.0.0.1',
        'port' => 3312,
        'maxQueryTime' => 3000,
        'enableProfiling'=>0,
        'enableResultTrace'=>0,
        'fieldWeights' => array(
            'title' => 10000,
            'meta_keywords' => 100,
        ),
    ),
);