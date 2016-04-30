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
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>

<div class="maindiv">
	<div class="form_div">
		<!-- <div class="title">Login</div>
 -->		<form method="post" action="Login.php">
			<h2>Login</h2>
			
			
			<hr/>
			<br>
			Name:<br>
			<input class="input" type="text" name="name"><span class="error"> * <?php echo $nameError;?></span><br>
			Password<br>
			<input type="password" name="pass" class="input"/><span class="error"> * <?php echo $passError;?></span><br>


        <input class="submit" type="submit" name="submit" value="Login"> 
        <input class="submit" type="submit" name="submit1" value="Register"> 
        
      </form>
      </div>
      <div class="title"><?php echo $err ?></div>
  </div>
</body>
</html>
