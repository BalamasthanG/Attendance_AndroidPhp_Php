<?php
include_once './db_functions.php';
$cs1="";
$cs2="";
$rw= "";
$tab = "";
//Create Object for DB_Functions clas
session_start();
$db = new DB_Functions();
$name =$_SESSION['name'];
$rs = $db->showclass( $name);

if($rs){
 $row = mysql_fetch_array($rs);
  $cs1 = $row["class1"];
  $cs2 = $row["class2"];
 }
 else{
  $cs1 = "failed";
 }


 /*if(isset($_POST['submit'])){

    $cs = $_POST['cls'];

    $res = $db->UsrClas($cs);

    if($res){

    $rw = mysql_fetch_array($res);
  }
  else{
    echo "Error";
  }

 }*/

 if(!(isset($_SESSION['name']))){
  header("location:Login.php");
 }





    ?>




<!DOCTYPE HTML> 
<html>
  <head>
  <title>Registration</title>
  <meta name="robots" content="noindex, nofollow" />
  <!-- <link rel="stylesheet" href="style.css" /> -->
  </head>
  <body>
 
    <div class="maindiv">
      <div class="form_div">
      <div class="title"><h2>View Student Detail</h2></div>

     <form method="POST">
<h2>Report Details</h2>
<hr/><br>

 Choose class:
<select name='cls'>
  <option value='<?php echo $cs1;?>'><?php echo $cs1;?></option>
  <option value='<?php echo $cs2;?>'><?php echo  $cs2;?></option>
</select>
<br>


Choose month:
<select>
  <option>Jan</option>
  <option>Feb</option>
  <option>Mar</option>
  <option>Apr</option>
  <option>May</option>
  <option>Jun</option>
  <option>Jul</option>
  <option>Aug</option>
  <option>Sep</option>
  <option>Oct</option>
  <option>Nov</option>
  <option>Dec</option>
</select>
<br>
<input class = "submit" type="submit" name="submit" value= "View Detail"/>
<a href = "http://localhost/sqlitemysqlsync/Login.php">Back</a><br>
 <input type ='submit' name = 'logout' value = 'Logout'></a>



</form>
      </div>
    
    <br>
    <br>
  <div class="title"> <center> <?php echo $rss;?></center></div>
   <br>

   

<?php

if(isset($_POST['logout'])){
  header('location:logout.php');
}
  


if(isset($_POST['submit'])){

    $cs = $_POST['cls'];
    echo $cs."  this is under working ";

    

   // $res = $db->UsrClas($cs);
    $r = date('Ymd');
    $k = date('Y-m-d');
    $res =$db->ViewStu($name.$cs,"m".$r);

    if($res){

    $rw = mysql_fetch_array($res);
  }
  else{
    echo "Error";
  }

 }
  echo "<center>";
  echo "<table border=1>";
  echo  "<tr><td>Id</td><td>Roll</td><td>Name</td><td>".$k."</td></tr>";
     while($rw){
        echo "<tr><td>".$rw['Id']."</td><td>".$rw['roll']."</td><td>".$rw['Name']."</td><td>".$rw["m".$r]."</td></tr>";
        $rw = mysql_fetch_array($res);

   }
    
  "</table>" 
  ?> 
   </div> 

 


    
  </body>
</html>