<?php

require_once('parentClass.php');

class Education extends ParentClass
{
    public static $tableName = 'education';
    public static $className = 'Education';
    public static $dbColumns = ['college_name','certificate_name','start_date','end_date','description'];
    public $college_name;
    public $certificate_name;
    public $start_date;
    public $end_date;
    public $description;
    
    public function __construct($info = [])
	{
		if (!empty($info)) {
			$this->college_name = $info['college_name'];
			$this->certificate_name = $info['certificate_name'];
			$this->start_date = $info['start_date'];
			$this->end_date = $info['end_date'];
            $this->description= $info['description']; 
		}
	}
}
?>