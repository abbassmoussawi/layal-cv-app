<?php

require_once('parentClass.php');

class Post extends ParentClass
{
    public static $tableName = 'posts';
    public static $className = 'Post';
    public static $dbColumns = ['title','content','author','time','image_url'];
    public $title;
    public $content;
    public $image_url;
    public $author;
    public $time;

    public function __construct($info = [])
	{
		if (!empty($info)) {
			$this->title = $info['title'];
			$this->content = $info['content'];
			$this->author = $info['author'];
			$this->image_url = $info['image_url'];
            $this->time = $info['time'];
		}
	}
   
}
?>