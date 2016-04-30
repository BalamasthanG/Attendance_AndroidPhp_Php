<?php

$ins = $_POST['insert'];
$trc= $_POST['track'];
session_start();
$name = $_SESSION['name'];

if(!(isset($_SESSION['name']))){
	header('location:Login.php');
}

if(isset($_POST['logout'])){
	header('location:logout.php');
}

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
<link rel="stylesheet" href="style.css" />
</head>
<body>
 <div class="wrapper">
	<div class="container">

	<br><br><center><h2><b><i>Select operation</i></b></h2><br><br>
<form action='admin.php' method='post' class="form">
	<button type= 'submit' name="insert">Student Db</button>
	<button type='submit' name="track">Register Status</button><br><br>
	<button type='submit' name='logout'>Logout</button>
</form>
</div>
<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div> <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    
  </body>
</html>