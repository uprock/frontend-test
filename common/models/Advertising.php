<?php

Yii::import('common.models._base.BaseAdvertising');

class Advertising extends BaseAdvertising
{
    const  CACHE_TIME = 259200; // Кешируем на 3 дня запросы
    const  SQL_DEPENDENCY = "SELECT max(updated_at) FROM advertising"; // Запрос, от которого зависит кеш

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function behaviors()
    {
        return array(
            'rest' => array(
                'class' => 'RestBehavior',
            ),
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'created_at',
                'updateAttribute' => 'updated_at',
            ),
        );
    }

    public function listData()
    {
        $data = $this->fields(array('id','is_active','title','category','position'));

        if(Yii::app()->language == "en") {
            $data['html'] = $this->getHtml($this->html_en);
            $data['html_mobile'] = $this->getHtml($this->html_mobile_en);
        }else {
            $data['html'] = $this->getHtml($this->html);
            $data['html_mobile'] = $this->getHtml($this->html_mobile);
        }

        return $data;
    }

    private function getHtml($text){
        preg_match("/<noscript>(.*?)<\/noscript>/s", $text, $output);
        if(isset($output[1])) {
            return str_replace("\r\n","",$output[1]);
        } else {
            return $text;
        }

    }
}