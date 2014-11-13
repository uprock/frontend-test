<?php
class WebUser extends CWebUser
{
    private $_model = null;
    private $_keyPrefix;

    function getRole()
    {
        if ($user = $this->getModel()) {
            return $user->role;
        }
    }

    private function getModel()
    {
        if (!$this->isGuest && $this->_model === null) {
            $this->_model = User::model()->findByPk($this->id, array('select' => 'role'));
        }
        return $this->_model;
    }

    /**
     * Вынес метод получения префикса для того что бы сессия пользователя была доступна на бекенде и фронтенде
     */
    public function getStateKeyPrefix()
    {
        if ($this->_keyPrefix !== null)
            return $this->_keyPrefix;
        else
            return $this->_keyPrefix = md5('Yii.' . get_class($this));
    }
}