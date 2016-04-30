<?php
include_once('./db_functions.php');
session_start();
$name = $_SESSION['name'];

$db = new DB_Functions();

$rs = $db->logout($name,  0);

session_unset();
session_destroy();

header("location:Login.php");	

 


?>

