<?php

require_once('parentClass.php');

class Email extends ParentClass
{
    public static $tableName = 'emails';
    public static $className = 'Email';
    public static $dbColumns = ['fullName', 'subject', 'fromEmail', 'phoneNumber', 'message'];

 
    public $fullName;
    public $subject;
    public $fromEmail;
    public $phoneNumber;
    public $message;
    

    public function __construct($info = [])
	{
		if (!empty($info)) {
			$this->fullName = $info['fullName'];
			$this->subject = $info['subject'];
			$this->fromEmail = $info['fromEmail'];
			$this->phoneNumber = $info['phoneNumber'];
            $this->message= $info['message'];
           
            
		}
	}
}
?>