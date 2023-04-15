<?php



function db_conn()
{
    $host = 'localhost';
    $dbname = 'blog_db';
    $user = 'root';
    $password = '';

    $conn = "mysql:host=$host;dbname=$dbname;charset=UTF8";
    $conn = new PDO($conn, $user, $password);
    return $conn;
}
$database = db_conn();

