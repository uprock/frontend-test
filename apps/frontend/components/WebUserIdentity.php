<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class WebUserIdentity extends CUserIdentity
{
	private $id_user;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user=User::model()->findByAttributes(array('email'=>$this->username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($user->password!==crypt($this->password,$user->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->errorCode=self::ERROR_NONE;
            $this->id_user = $user->id_user;
            $this->setState('id',$user->id_user);
            $this->setState('uid',$user->uid);
            $this->setState('name', $user->name);
            $this->setState('service', $user->service);
            $this->setState('photo', '');
        }
        return !$this->errorCode;
	}

	public function getId()
    {
        return $this->id_user;
    }
}