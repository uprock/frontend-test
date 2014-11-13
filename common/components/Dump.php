<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cezar
 * Date: 28.08.14
 * Time: 14:54
 * To change this template use File | Settings | File Templates.
 */

class Dump {
    public static function d($var,$die=true,$level=10,$highlight = true) {
        CVarDumper::dump($var,$level,$highlight);
        if ($die) die;
    }
}