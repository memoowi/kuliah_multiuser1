<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "multi_login";

$connection = mysqli_connect($host, $user, $pass, $db_name);
if(!$connection){
    die("Connection Failed");
}
?>