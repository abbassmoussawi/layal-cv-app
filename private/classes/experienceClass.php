<?php

require_once('parentClass.php');

class Experience extends ParentClass
{
    public static $tableName = 'experiences';
    public static $className = 'Experience';
    public static $dbColumns = ['company_name','job_title','start_date','end_date','job_description','skills_gained'];
    public $company_name;
    public $job_title;
    public $start_date;
    public $end_date;
    public $job_description;
    public $skills_gained;

    public function __construct($info = [])
	{
		if (!empty($info)) {
			$this->company_name = $info['company_name'];
			$this->job_title = $info['job_title'];
			$this->start_date = $info['start_date'];
			$this->end_date = $info['end_date'];
            $this->job_description= $info['job_description'];
            $this->skills_gained= $info['skills_gained'];
            
		}
	}
}
?>