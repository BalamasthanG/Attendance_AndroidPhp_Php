<?php

$ins = $_POST['insert'];
$trc= $_POST['track'];

if(isset($ins)){
	header('location:insertuser.php');
}
if(isset($trc)){
	header('location:trackdetail.php');
}


?>

<html>
<head>
<title>Admin Page</title>
</head>
<body>

	<br><br><center><h3>Select operation</h3><br><br>
<form action='admin.php' method='post'>
	<input type= 'submit' name="insert">Student Db</input>
	<input type='submit' name="track">Track Detail</input>
</form>