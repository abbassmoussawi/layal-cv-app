<?php

require_once('parentClass.php');

class User extends ParentClass
{
    public static $tableName = 'users';
    public static $className = 'User';
    public static $dbColumns = ['id','type','first_name','last_name','email','hashed_password'];
    public $id;
    public $first_name;
    public $type;

    public $last_name;
    public $email;
    public $hashed_password;

//     public function __construct($info = [])
// 	{ 
        
//         if(!empty($info)){
// 			$this->first_name = $info['first_name'];
// 			$this->last_name = $info['last_name'];
// 			$this->email = $info['email'];
// 			$this->type = $info['type'];
//             $this->hashed_password = $info['hashed_password'] ;

// 	}
// }
    

	public function verify_password($password)
	{
		password_verify($password, $this->hashed_password) ; 
	}

}

?>