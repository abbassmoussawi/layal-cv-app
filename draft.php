<?php
$pass = 123456;
$passHash = password_hash($pass,PASSWORD_DEFAULT);

//verifying password
if(password_verify("123456",$passHash)){
    echo "exact </br>";
}else{
    echo "try again </br>";
}

//var and dump
var_dump($passHash);
// class Admin{
//     public static $table = "admin";
//     public static function getTableName(){
//         echo self::$table;
//         // echo static::$table;
//     }
// }
// class User extends Admin{
//     public static $table = "user";
// }
// Admin::getTableName();
// echo"</br>";
// User::getTableName();
echo "****************************************</br>";
echo __FILE__;
echo"</br>";
echo dirname(__FILE__);
define("PROJECT_PATH",dirname(__FILE__));
define("PRIVATE_PATH",PROJECT_PATH.'/private');
echo "</br>";
define ("PUBLIC_PATH",PROJECT_PATH.'/public');
echo PUBLIC_PATH;
echo"</br>";
echo $_SERVER['SCRIPT_NAME'];
/******************** */
// <?= $_SERVER['SCRIPT_NAME'];?>
<?="</br>";?>
<?php
// $end =  strpos($_SERVER['SCRIPT_NAME'], '/public')+7 ;
// echo"</b>";
// echo $end;
// $substr = substr($_SERVER['SCRIPT_NAME'], 0, $end);
// echo $substr;



// if($result){
//     redirect_to(url_for('staff/index.php'));
// }
 
// If upload button is clicked ...
// if (isset($_POST['upload'])) {

//     $imagename = $_FILES["uploadfile"]["imagename"];
//  
//     $tempname = $_FILES["uploadfile"]["tmp_name"];
//     $folder = "../../images/" . $filename;
// }
?>
<?= "</br>";?> 


?>