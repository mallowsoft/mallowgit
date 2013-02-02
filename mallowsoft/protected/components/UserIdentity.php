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
//	public function authenticate()
//	{
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
//	}
    public function authenticate()
	{
//        $options = Yii::app()->params['ldap'];
        

    $ldap_host = "server.local";
    $ldap_dn = "uid=".$this->username.",cn=users,dc=server,dc=local";
    $ldap = ldap_connect($ldap_host) or die("could not connect to".$ldap_host);

//    $dc_string = "dc=" . implode(",dc=",$options['dc']);
        
    
//    $connection = ldap_connect($options['host'] or die ("error in connecting ldap server"));
        ldap_set_option( $ldap, LDAP_OPT_PROTOCOL_VERSION, 3 );
//    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    
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
}
    
?>
