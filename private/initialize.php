<?php

define("PRIVATE_PATH",dirname( __FILE__));
define("PROJECT_PATH",dirname( PRIVATE_PATH));
define("PUBLIC_PATH",PROJECT_PATH.'/public');
define("SHARED_PATH",PRIVATE_PATH.'/shared');

//position of the PUBLIC section
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
//$doc_root always gives the url until the 'PUBLIC' level
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

require_once 'db_connection.php';
require_once 'functions.php';

require_once 'shared/header.php';

require_once 'classes/userClass.php';
require_once 'classes/parentClass.php';
require_once 'classes/postClass.php';
require_once 'classes/experienceClass.php';
require_once 'classes/educationClass.php';
require_once 'classes/emailClass.php';





$database = db_conn();
ParentClass::set_database($database);