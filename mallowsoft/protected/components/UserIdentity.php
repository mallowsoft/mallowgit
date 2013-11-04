<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    
    public $_id;
    public $userid;
    
    // DEFAULT AUTHENTICATION
	public function authenticate()
	{
//		$users=array
//        (
//    // username => password
//	//		'demo'=>'demo',
//	//		'admin'=>'admin',
//		);
      //  echo $this->username;
      //  echo $this->password;
        $user = UserTable::model()->find('username=:username',array(':username'=>$this->username));
       // $user=UserTable::model()->find('LOWER(username)=?',array(strtolower($this->username)));
   //     echo $user->password;
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
    //    echo $this->password;
        
        
        if($user == null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(crypt($this->password,$user->password) != $user->password)
        {
          //  echo "well";
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
		else
		{
			$this->_id=$user->id;
			$this->userid=$user->id;
			//$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return $this->errorCode == self::ERROR_NONE;
    }
    public function getId()
	{
		return $this->_id;
	}
    /* ldap
    public function authenticate()
	{
    $ldap_host = "server.local";
    $ldap_dn = "uid=".$this->username.",cn=users,dc=server,dc=local";
    $ldap = ldap_connect($ldap_host) or die("could not connect to".$ldap_host);
    ldap_set_option( $ldap, LDAP_OPT_PROTOCOL_VERSION, 3);

    if($ldap)
    {
        $bind= @ldap_bind($ldap,$ldap_dn, $this->password);
        if(!$bind)
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else
            $this->errorCode = self::ERROR_NONE;
    }
    return !$this->errorCode;
    }
  */
}
?>
