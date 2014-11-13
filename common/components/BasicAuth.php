<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cezar
 * Date: 21.10.14
 * Time: 14:22
 * To change this template use File | Settings | File Templates.
 */
class BasicAuth{

    /**
     * @var string
     */
    public $realm = 'API';

    /**
     * @var string
     */
    public $identityClass = 'common.components.UserIdentity';


    public function init(){
        $app = Yii::app();
        $app->request->enableCsrfValidation = false;
        $app->detachEventHandler('onBeginRequest',array($app->request, 'validateCsrfToken'));
        $app->attachEventHandler('onBeginRequest', array($this, 'onBeginRequest'));
    }

    /**
     * @param \CEvent $event
     */
    public function onBeginRequest(\CEvent $event)
    {
        header('WWW-Authenticate: Basic realm="' . $this->realm . '"');

        if (!isset($_SERVER['PHP_AUTH_USER'])) {
            throw new \CHttpException(401, Yii::t('app', 'Undefined auth user'));
        }
        $user = $_SERVER['PHP_AUTH_USER'];
        $password = $_SERVER['PHP_AUTH_PW'];

        $identityClass = Yii::import($this->identityClass);
        $identity = new $identityClass($user, $password);

        if (!$identity->authenticate()) {

            throw new \CHttpException(401, $identity->errorMessage);
        }

        Yii::app()->user->login($identity);

    }
}