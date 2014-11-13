<?php 
return array(

    /**
     * OPERATIONS
     */
    'user_index'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'user_create'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'user_update'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'user_delete'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    
    'article_index'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'article_create'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'article_update'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'article_delete'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),

    'event_index'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'event_create'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'event_update'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'event_delete'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),


    'magazine_index'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'magazine_create'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'magazine_update'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'magazine_delete'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),

    'eventimg_index'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'eventimg_create'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'eventimg_update'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),
    'eventimg_delete'=>array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => '',
        'bizRule' => null,
        'data' => null
    ),

    /**
     * TASKS
     */
    'user_update_own'=>array(
        'type' => CAuthItem::TYPE_TASK,
        'description' => '',
        'children' => array(
           'user_update',
        ),
        'bizRule' => 'return Yii::app()->user->id==$params["id"];',
        'data' => null
    ),

    'article_update_own'=>array(
        'type' => CAuthItem::TYPE_TASK,
        'description' => '',
        'children' => array(
           'article_update',
        ),
        'bizRule' => 'return Yii::app()->user->id==$params["user_id"];',
        'data' => null
    ),
    'article_delete_own'=>array(
        'type' => CAuthItem::TYPE_TASK,
        'description' => '',
        'children' => array(
           'article_delete',
        ),
        'bizRule' => 'return Yii::app()->user->id==$params["user_id"];',
        'data' => null
    ),

    /**
     * ROLES
     */
    'admin'=>array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => '',
        'children' => array(
            'user_index',
            'user_create',
            'user_update',
            'user_delete',
            'article_index',
            'article_create',
            'article_update',
            'article_delete',
            'event_index',
            'event_create',
            'event_update',
            'event_delete',
            'magazine_index',
            'magazine_create',
            'magazine_update',
            'magazine_delete',
            'eventimg_index',
            'eventimg_create',
            'eventimg_update',
            'eventimg_delete',
        ),
        'bizRule' => null,
        'data' => null
    ),
    'editor'=>array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => '',
        'children' => array(
            'user_update_own',
            'article_index',
            'article_create',
            'article_update',
            'article_delete',
            'event_index',
            'event_create',
            'event_update',
            'event_delete',
            'magazine_index',
            'magazine_create',
            'magazine_update',
            'magazine_delete',
            'eventimg_index',
            'eventimg_create',
            'eventimg_update',
            'eventimg_delete',
        ),
        'bizRule' => '',
        'data' => null
    ),
    'author'=>array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => '',
        'children' => array(
            'user_update_own',
            'article_index',
            'article_create',
            'article_update_own',
            'article_delete_own',
        ),
        'bizRule' => '',
        'data' => null
    ),
);