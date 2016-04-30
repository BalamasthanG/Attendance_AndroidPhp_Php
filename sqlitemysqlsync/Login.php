<?php
include_once('./db_functions.php');
if(isset($_POST['submit']))
{

	if (empty($_POST['name'])) {
		$nameError="Enter Name";
	}elseif (empty($_POST['pass'])) {
		$passError = "Enter Password";
	}else{

		$db = new DB_Functions();

        $name=$_POST['name'];
        $pass=$_POST['pass'];
        

        $rs= $db->login($name,$pass, 1);

        if(($name == "admin")&&($pass=="admin")){

        	session_start();
        	$_SESSION['name'] = $name;
        	header('location:admin.php');
        	
        }elseif ($rs) {
        	session_start();
        	$_SESSION['name'] = $name;
        	header('location:Usrvw.php');
        	
        }
        else {
        	$err = "USR NAME OR PW INVALID";
        }


	}


}
if(isset($_POST['submit1']))
{
     header('location:regd.php') ;

}








?>
<html>
<head>
<title>Log Manager</title>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="style1.css" />
<style type="text/css">
  #header {
    background-color: #3a2127;
    color:white;
    text-align:right;
    padding:80px;
    
}
</style>

</head>
<body>
<!-- <div id="header" ></div> -->
<div class="wrapper">
	<div class="container">
		<!-- <div class="title">Login</div> -->		
		<h2><b><i>Login</i></b></h2>

 		<form method="post" action="Login.php" class="form">
			
			
			
			
			
			<?php echo $nameError;?>
			<input class="input" type="text" name="name" placeholder="Username" required="">  <?php echo $passError;?>
			
			<input type="password" name="pass" class="input" placeholder="Password" required="" />


        <button  class="submit" type="submit" name="submit"  id="login-button">Login</button> 
        
        
      </form>
      <form method='post' action='Login.php'><button class="submit" type="submit" name="submit1" > Register</button></form>
      <?php echo $err ?>
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
                              <li></li>
	</ul>
      <?php echo $err ?>
  </div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
</body>
</html>
