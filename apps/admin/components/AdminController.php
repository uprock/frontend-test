<?php

class AdminController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

   public function init(){
        $langSession = Yii::app()->user->getState('language');
        $langParam = Yii::app()->request->getParam('language');
        $lang = ($langParam != null ? $langParam : $langSession);
        if ($lang == null) {
            $lang = Yii::app()->language;
        }
        if ($langSession != $lang) {
            Yii::app()->user->setState('language', $lang);
        }
        Yii::app()->language = $lang;
    }
}