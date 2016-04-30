<?php
$chk="";
include_once './db_functions.php';

//Create Object for DB_Functions clas
session_start();

$name =$_SESSION['name'];

if(!(isset($_SESSION['name']))){
  header("location:Login.php");
}

if(isset($_POST['logout'])){
  header("location:logout.php");
}

if(isset($_POST['back'])){
  header('location:admin.php');
}


if(isset($_POST['submit'])){


    $name = $_POST['name'];
    $bat = $_POST['bat'];
    $yr = $_POST['yr'];
    $dpt = $_POST['dept'];
    $sec = $_POST['sec'];
    $roll = $_POST['roll'];

    $id = $bat.$yr.$dpt.$sec;
    $db = new DB_Functions();
    //echo $name.$id;
    
    $rs = $db->student($name,$bat,$yr,$dpt,$sec,$id,$roll);
  
  
  
  
    if($rs){

        $chk = "Successfully Saved";

    } else{
      $chk = "Failed";
    }
  


}



/*if(isset($_POST["username"]) && !empty($_POST["username"])){
$db = new DB_Functions(); 
//Store User into MySQL DB
$uname = $_POST["username"];
$res = $db->storeUser($uname);
  //Based on inserttion, create JSON response
  if($res){ 
    " <div class='title'>Insertion successful</div>";
 }else{ 
     "<div class='title'>Insertion failed</div>";
   }
}*/

    ?>




<html>
<head>
  <title>Database</title>
  <link rel="stylesheet" href="style8.css" />
  <link rel="stylesheet" href="style1.css" />
</head>

<body>
<div class="wrapper">
<div class="container">
<div class="title">
<h2><b><i>Welcome <?php
echo $_SESSION['name'];?></i></b></h2>
</div>


<form method="POST" action="insertuser.php" class="form">


<h2>Enter student Details</h2>
<hr/><br>
<table align =center text-align =left>
<tr><th>Batch:</th><td>
        <select name="bat">
          <option value="12">2012-2016</option>
          <option value="13">2013-2017</option>
          <option value="14">2014-2018</option>
          <option value="15">2015-2019</option>
        </select></td></tr>

     
        
   <tr><th>Year:</th><td>
        <select name="yr">
          <option value="IV">IV</option>
          <option value="III">III</option>
          <option value="II">III/option>
          <option value="I">I</option>
        </select></td></tr>
      
    <tr><th>Department:</th><td>
        <select name="dept">
          <option value="CS">CSE</option>
          <option value="EC">ECE</option>
          <option value="IT">IT</option>
          <option value="Civ">CIVL</option>
          <option value="Mec">Mech</option>

        </select></td></tr>
        
      <tr><th>  Section:</th><td>
        <select name="sec">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
        </td></tr>
      </table>
      <br>
        

 
Roll number : <input type="text" name='roll' placeholder="" required="" /> 

Name : <input type="text" name='name' placeholder="" required="" /><br>

<button  type="submit"  name='submit'/>Add Student</button>

</form>
<form action='insertuser.php' method='post' ><button type = "submit" name = 'back'>Back</button><br><br>
<button type= "submit" name="logout">LogOut</button></form>
<h2><?php echo $chk ?></h2>
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
</div>

 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
</body>
</html>